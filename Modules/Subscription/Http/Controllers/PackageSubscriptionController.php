<?php

namespace Modules\Subscription\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Subscription\DataTables\PackageSubscriptionDataTable;
use Modules\Subscription\Services\PackageSubscriptionService;
use Modules\Subscription\Entities\{
    Package,
    PackageSubscription,
    SubscriptionDetails
};
use Modules\Subscription\Http\Requests\{
    PackageSubscriptionStoreRequest,
    PackageSubscriptionUpdateRequest
};
use App\Models\{
    Preference,
    User
};
use Modules\OpenAI\Entities\{
    ChatBot,
    ChatCategory,
    UseCase,
    UseCaseCategory
};

use Modules\OpenAI\Services\ImageService;
use Modules\Subscription\DataTables\PaymentDataTable;
use Modules\Subscription\Services\Mail\{
    SubscriptionExpireMailService,
    SubscriptionInvoiceMailService,
    SubscriptionRemainingMailService
};

class PackageSubscriptionController extends Controller
{
    /**
     * Package Subscription Constructor
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //this middleware should be for POST request only
        if ($request->isMethod('post')) {
            $this->middleware('checkForDemoMode')->only('setting');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param PackageSubscriptionDataTable $dataTable
     * @return \Illuminate\Contracts\View\View
     */
    public function index(PackageSubscriptionDataTable $dataTable)
    {
        return $dataTable->render('subscription::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data['packages'] = Package::active('status')->get();
        $data['users'] = User::active('status')->get();
        return view('subscription::create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PackageSubscriptionStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PackageSubscriptionStoreRequest $request, PackageSubscriptionService $service)
    {
        $response = $service->store($request->all());
        $service->storeSubscriptionDetails($request->user_id);

        $this->setSessionValue(['status' => $response['status'], 'message' => $response['message']]);

        if (isset($response['subscription'])) {
            return redirect()->route('package.subscription.edit', ['id' => $response['subscription']->id]);
        }

        return redirect()->route('package.subscription.index');
    }

    /**
     * Subscription invoice
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function invoice($id)
    {
        $data['subscription'] = SubscriptionDetails::find($id);

        if (!$data['subscription']) {
            return redirect()->route('package.subscription.payment')->withErrors(__('The :x does not exist.', ['x' => __('Invoice')]));
        }

        return view('subscription::invoice', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $data['subscription'] = PackageSubscription::find($id);

        if (!$data['subscription']) {
            return redirect()->route('package.subscription.index')->withFail(__('The :x is not found.', ['x' => __('Package Subscription')]));
        }

        $data['features'] = PackageSubscriptionService::getFeatures($data['subscription']);

        $data['packages'] = Package::active('status')->get();
        $data['users'] = User::active('status')->get();

        $data['meta'] = (new ImageService)->processResolutionsData();

        $data['useCaseCategory'] = UseCaseCategory::select('id', 'name')->get();

        $data['useCaseTemplate'] = UseCase::select('use_cases.id', 'use_cases.name', 'use_cases.slug', 'use_cases.status')
            ->join('use_case_use_case_category', 'use_cases.id', 'use_case_use_case_category.use_case_id')
            ->join('use_case_categories', 'use_case_categories.id', 'use_case_use_case_category.use_case_category_id')
            ->where('use_cases.status', 'active')
            ->whereIn('use_case_category_id', json_decode($data['subscription']->usecaseCategory) ?? [])
            ->get();
        
        $data['chatCategory'] = ChatCategory::select('id', 'name')->get();
        $data['chatAssistants'] = ChatBot::select('id','name', 'code')
            ->whereIn('chat_category_id', json_decode($data['subscription']->chatCategory) ?? [])
            ->where('status', 'active')->get();

        return view('subscription::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PackageSubscriptionUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PackageSubscriptionUpdateRequest $request, PackageSubscriptionService $service, $id)
    {
        $response = $service->update($request->all(), $id);

        if ($request->status != 'Active') {
            $subscription = $service->getUserSubscription($request->user_id);
            $history = $subscription->activeDetail();
            $gateway = mb_strtolower($history->payment_method ?? '');
            $subscriptionId = $subscription->{str_replace('recurring', '', $gateway) . '_subscription_id'};
            $customerId = User::find($request->user_id)->{str_replace('recurring', '', $gateway) . '_customer_id'};
            
            if (str_contains($gateway, 'recurring')) {
                $service->cancelRecurring($gateway, $subscriptionId, $customerId);
            }
        }

        if ($response['status'] == 'success') {
            $subscription = subscription('getSubscription', $id);
            $service->updateSubscriptionDetails($subscription->user_id);

            if (isActive('Affiliate')) {
                $subscriptionDetails = SubscriptionDetails::where('user_id', $subscription->user_id)->orderBy('id', 'desc')->first();
                \Modules\Affiliate\Entities\ReferralPurchase::referralPurchaseUpdate($subscriptionDetails);
            }
        }

        $this->setSessionValue($response);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $response = (new PackageSubscriptionService)->delete($id);
        $this->setSessionValue($response);

        return back();
    }

    /**
     * Package subscription setting.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setting(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('subscription::configuration');
        }

        $category = 'subscription';
        $i = 0;
        foreach ($request->except('_token') as $key => $value) {
            $data[$i]['category'] = $category;
            $data[$i]['field']    = $key;
            $data[$i++]['value'] = $value ?? '';
        }

        foreach ($data as $key => $value) {
            Preference::storeOrUpdate($value);
        }

        return back()->withSuccess(__('The :x has been successfully saved.', ['x' => __('Subscription Settings')]));
    }

    /**
     * Display a listing of the resource.
     *
     * @param PaymentDataTable $dataTable
     * @return \Illuminate\Contracts\View\View
     */
    public function payment(PaymentDataTable $dataTable)
    {
        return $dataTable->render('subscription::payment');
    }

    /**
     * Send notification to subscriber.
     *
     * @param int $id
     * @return json
     */
    public function notification($id)
    {
        $subscription = subscription('getSubscription', $id);

        if (subscription('isExpired', $subscription->user_id)) {
            $response = (new SubscriptionExpireMailService)->send($id);
        } else {
            $response = (new SubscriptionRemainingMailService)->send($id);
        }

        return response()->json($response);
    }

    /**
     * Subscription Email invoice
     *
     * @param int $id
     * @return array
     */
    public function invoiceEmail($id)
    {
        $subscription = SubscriptionDetails::find($id);

        if (empty($subscription)) {
            return [
                'status' => false,
                'message' => __('The :x does not exist.', ['x' => __('Subscription')])
            ];
        }
       return (new SubscriptionInvoiceMailService)->send($subscription);
    }

    /**
     * Subscription invoice pdf
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|void
     */
    public function invoicePdf($id)
    {
        $subscription = SubscriptionDetails::find($id);

        try {
            if (!empty($subscription)) {
                if ($subscription->billing_cycle) {
                    $packageName = $subscription?->package?->name;
                } else {
                    $packageName = $subscription?->credit?->name;
                }

                $data['subscription'] = $subscription;
                $data['logo'] = Preference::where('field', 'company_logo')->first()->fileUrl();
                return printPDF($data, $packageName . '-' . $subscription->code . '.pdf', 'subscription::invoice_print', view('subscription::invoice_print', $data), 'pdf');
            }
        } catch (\Exception $e) {
            \Session::flash('fail', $e->getMessage());
        }

        return redirect()->back();
    }
}
