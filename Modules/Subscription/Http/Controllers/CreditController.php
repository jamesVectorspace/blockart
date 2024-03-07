<?php

namespace Modules\Subscription\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Subscription\DataTables\CreditDataTable;
use Modules\Subscription\Services\PackageService;

use Modules\Subscription\Entities\{
    Credit,
    SubscriptionDetails
};
use Modules\Subscription\Http\Requests\{
    CreditStoreRequest,
    CreditUpdateRequest
};
use Modules\Subscription\Services\CreditService;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CreditDataTable $dataTable
     * @return \Illuminate\Contracts\View\View
     */
    public function index(CreditDataTable $dataTable)
    {
        return $dataTable->render('subscription::credit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $features = PackageService::features();
        $data['features'] = miniCollection($features, true);

        return view('subscription::credit.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreditStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreditStoreRequest $request)
    {
        $response = (new CreditService)->store($request->validated());

        $this->setSessionValue(['status' => $response['status'], 'message' => $response['message']]);

        return redirect()->route('credit.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $data['credit'] = Credit::find($id);

        if (is_null($data['credit'])) {
            return redirect()->route('credit.index')->withFail(__('The :x is not found.', ['x' => __('Credit')]));
        }

        $features = PackageService::features();
        $data['features'] = miniCollection($features, true);

        $data['creditFeatures'] = $data['credit']['features'];

        return view('subscription::credit.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreditUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreditUpdateRequest $request, $id)
    {
        $response = (new CreditService())->update($request->validated(), $id);
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
        $response = (new CreditService)->delete($id);

        $this->setSessionValue($response);

        return back();
    }
    
    /**
     * Paid unpaid plan
     *
     * @param int $id (history_id)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function paid(CreditService $service, $id)
    {
        $history = SubscriptionDetails::find($id);
        
        if (!$history) {
            return back()->withErrors('History does not exist.');
        }
        
        $plan = $service->manualPaid($history);
        
        if ($plan['status'] == 'success') {
            
            if (isActive('Affiliate')) {
                \Modules\Affiliate\Entities\ReferralPurchase::referralPurchaseUpdate((object)['payment_status' => 'Paid', 'id' => $id, 'amount_billed' => $history->amount_billed, 'package_subscription_id' => $history->package_subscription_id, 'package_id' => $history->package_id]);
            }
            
            return back()->withSuccess($plan['message']);
        }
        
        return back()->withErrors($plan['message']);
    }
}
