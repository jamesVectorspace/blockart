<?php

namespace Modules\Subscription\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Modules\Subscription\Entities\{
    Package, SubscriptionDetails
};
use Modules\Subscription\Http\Resources\{
    PlanResource,
    SubscriptionResource,
    SubscriptionHistoryResource
};
use Modules\Subscription\Services\PackageSubscriptionService;
use Illuminate\Support\Facades\{
    DB
};
use App\Models\{
    Currency,
    Preference
};
use Modules\Gateway\Redirect\GatewayRedirect;

class PackageSubscriptionController extends Controller
{
    /**
     * Subscription service
     *
     * @var object
     */
    protected $subscriptionService;

    /**
     * Package Subscription Service
     *
     * @var object
     */
    protected $packageSubscriptionService;

    /**
     * Constructor for Subscription controller
     *
     * @param SubscriptionService $subscriptionService
     * @return void
     */
    public function __construct(SubscriptionService $subscriptionService, PackageSubscriptionService $packageSubscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
        $this->packageSubscriptionService = $packageSubscriptionService;
    }

    /**
     * Subscription Details
     *
     * @return array
     */
    public function detail()
    {
        $subscription = subscription('getUserSubscription');

        if (!$subscription) {
            return $this->notFoundResponse([], __('No :x found.', ['x' => __('Subscription')]));
        }

        $allFeatures = subscription('getFeatures', $subscription);
        $coreFeature = subscription('getActiveFeature', $subscription->id);

        foreach ($coreFeature as $key => &$value) {
            $value['is_value_fixed'] = (bool) $allFeatures->{$key}['is_value_fixed'];
        }

        return $this->response([
            'data' => new SubscriptionResource($subscription),
            'features' => $coreFeature
        ]);
    }

    /**
     * Subscription History
     *
     * @param Request $request
     * @return array
     */
    public function history(Request $request)
    {
        $configs = $this->initialize([], $request->all());
        $history = SubscriptionDetails::with('package:id,name', 'credit:id,name', 'user:id,name')->where('user_id', auth()->id())->orderBy('id', 'DESC');

        if ($history->count() == 0) {
            return $this->notFoundResponse([], __('No :x found.', ['x' => __('History')]));
        }

        return $this->response([
            'data' => SubscriptionHistoryResource::collection($history->paginate($configs['rows_per_page'])),
            'pagination' => $this->toArray($history->paginate($configs['rows_per_page'])->appends($request->all()))
        ]);
    }

    /**
     * Subscription History Bill View
     *
     * @param int $id (subscription_detail_id)
     * @return array
     */
    public function viewBill(int $id)
    {
        $history = SubscriptionDetails::with('package:id,name', 'user:id,name')->where(['id' => $id, 'user_id' => auth()->id()])->first();

        if (!$history) {
            return $this->notFoundResponse([], __('No :x found.', ['x' => __('History')]));
        }

        return $this->response([
            'data' => new SubscriptionHistoryResource($history),
            'company' => [
                'name' => preference('company_name'),
                'email' => preference('company_email'),
                'phone' => preference('company_phone'),
                'street' => preference('company_street'),
                'zip_code' => preference('company_zip_code'),
            ]
        ]);
    }

    /**
     * Subscription History Bill Pay
     *
     * @param Request $request
     * @param int $id (subscription_detail_id)
     * @return array
     */
    public function payBill(Request $request, int $id)
    {
        $paymentType = ['automate' => 'recurring', 'manual' => 'single', 'customer_choice' => 'all'];

        DB::beginTransaction();
        try {
            $subscriptionDetails = SubscriptionDetails::where('id', $id)->first();

            if (!$subscriptionDetails) {
                return $this->notFoundResponse([], __('The :x does not exist.', ['x' => __('History')]));
            }

            $subscriptionDetails->update(['unique_code' => uniqid(rand(), true)]);
            $subscriptionDetails = $subscriptionDetails->refresh();

            $package = Package::find($subscriptionDetails->package_id);

            if (!$package || $package->status != 'Active') {
                return $this->notFoundResponse([], __('The package is not available.'));
            }

            $price = $package->discount_price[$subscriptionDetails->billing_cycle] > 0 ? $package->discount_price[$subscriptionDetails->billing_cycle] : $package->sale_price[$subscriptionDetails->billing_cycle];

            request()->query->add(['payer' => 'user', 'to' => techEncrypt('subscription-pending-payment-response')]);

            $route = GatewayRedirect::paymentRoute($subscriptionDetails, $price, $subscriptionDetails->currency, $subscriptionDetails->unique_code, $request, $paymentType[preference('subscription_renewal')]);

            DB::commit();
            return $this->successResponse([
                'data' => [
                    'payment_link' => $route
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Subscription History Bill Download
     *
     * @param Request $request
     * @param int $id (subscription_detail_id)
     * @return array
     */
    public function downloadBill(int $id)
    {
        $history = SubscriptionDetails::find($id);

        if (!$history) {
            return $this->notFoundResponse([], __('No :x found.', ['x' => __('History')]));
        }

        $data['subscription'] = $history;
        $data['logo'] = Preference::where('field', 'company_logo')->first()->fileUrl();

        try {
            printPDF($data, $history?->package?->name . '-' . $history->code . '.pdf', 'subscription::invoice_print', view('subscription::invoice_print', $data), 'pdf');

            return $this->successResponse(['status' => 'success', 'message' => __('Bill successfully downloaded')]);
        } catch (\Exception $e) {
            return $this->errorResponse(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Subscription Cancel
     *
     * @return array
     */
    public function cancel()
    {
        $subscription = subscription('getUserSubscription');

        if (!$subscription) {
            return $this->notFoundResponse([], __('The :x does not exist.', ['x' => __('Subscription')]));
        }

        try {
            $response = (new PackageSubscriptionService)->cancel($subscription->user_id);

            return $this->successResponse($response);
        } catch (\Exception $e) {
            return $this->errorResponse(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Subscription Plan
     *
     * @return array
     */
    public function plan()
    {
        $subscription = subscription('getUserSubscription');

        if (!$subscription) {
            return $this->notFoundResponse([], __('No :x found.', ['x' => __('Subscription')]));
        }

        $plan = Package::find($subscription->package_id);

        if (!$plan) {
            return $this->notFoundResponse([], __('No :x found.', ['x' => __('Plan')]));
        }

        return $this->response([
            'data' => new PlanResource($plan)
        ]);
    }

    /**
     * Subscription Store
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $package = Package::where(['id' => $request->package_id])->first();

        if (!$package) {
            return $this->notFoundResponse([], __('Plan not found'));
        }

        if ($package->status != 'Active') {
            return $this->unprocessableResponse([], __('Your selected plan is not active.'));
        }

        $subscription = subscription('getUserSubscription', auth()->user()->id);

        if ($subscription) {
            return $this->update($request);
        }

        DB::beginTransaction();
        try {
            $paymentType = ['automate' => 'recurring', 'manual' => 'single', 'customer_choice' => 'all'];
            $response = $this->packageSubscriptionService->storePackage($request->package_id, auth()->user()->id, $request->billing_cycle);

            if ($response['status'] != 'success') {
                throw new \Exception(__('Subscription fail.'));
            }

            $packageSubscriptionDetails = $this->packageSubscriptionService->storeSubscriptionDetails();

            if ($packageSubscriptionDetails->is_trial || $packageSubscriptionDetails->billing_price == 0) {
                $this->packageSubscriptionService->activatedSubscription($packageSubscriptionDetails->id);
                DB::commit();

                return $this->successResponse(['status' => 'success', 'message' => $response['message']]);
            }

            request()->query->add(['payer' => 'user', 'to' => techEncrypt('subscription-paid')]);

            $route = GatewayRedirect::paymentRoute($packageSubscriptionDetails, $packageSubscriptionDetails->amount_billed, $packageSubscriptionDetails->currency, $packageSubscriptionDetails->unique_code, $request, $paymentType[preference('subscription_renewal')]);

            DB::commit();

            return $this->successResponse([
                'data' => [
                    'payment_link' => $route
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->errorResponse(['status' => 'fail', 'message' => $response['message'] ?? $e->getMessage()]);
        }
    }

    /**
     * Subscription Update
     *
     * @param Request $request
     * @return array
     */
    public function update(Request $request)
    {
        $paymentType = ['automate' => 'recurring', 'manual' => 'single', 'customer_choice' => 'all'];

        DB::beginTransaction();
        try {
            $subscription = subscription('getUserSubscription', auth()->user()->id);
            $package = Package::find($request->package_id);
            $usedTrial = SubscriptionDetails::where(['package_subscription_id' => $subscription->id, 'is_trial' => 1, 'package_id' => $package->id])->first();

            if (($package->trial_day && !$usedTrial) || $package->sale_price[$request->billing_cycle] == 0) {
                $response = $this->packageSubscriptionService->storePackage($request->package_id, auth()->user()->id, $request->billing_cycle);

                if ($response['status'] != 'success') {
                    throw new \Exception(__('Subscription fail.'));
                }

                $packageSubscriptionDetails = $this->packageSubscriptionService->storeSubscriptionDetails();
                $this->packageSubscriptionService->activatedSubscription($packageSubscriptionDetails->id);
                DB::commit();

                return $this->successResponse(['status' => 'success', 'message' => $response['message']]);
            }

            session(['package_id' => $package->id]);
            $price = $package->discount_price[$request->billing_cycle] > 0 ? $package->discount_price[$request->billing_cycle] : $package->sale_price[$request->billing_cycle];
            $currency = Currency::find(preference('dflt_currency_id'))->name;

            request()->query->add(['payer' => 'user', 'to' => techEncrypt('subscription-update-paid')]);

            $route = GatewayRedirect::paymentRoute(['package_id' => $request->package_id, 'code' => $subscription->code, 'user_id' => $subscription->user_id, 'billing_cycle' => $request->billing_cycle], $price, $currency, uniqid(rand(), true), $request, $paymentType[preference('subscription_renewal')]);

            DB::commit();
            return $this->successResponse([
                'data' => [
                    'payment_link' => $route
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->errorResponse(['status' => 'fail', 'message' => $response['message'] ?? $e->getMessage()]);
        }
    }

    /**
     * Subscription Setting
     *
     * @return array
     */
    public function setting()
    {
        return $this->response([
            'data' => [
                'downgrade' => boolval(preference('subscription_downgrade')),
                'change_plan' => boolval(preference('subscription_change_plan')),
                'renewal_process' => preference('subscription_renewal')
            ]
        ]);
    }
}
