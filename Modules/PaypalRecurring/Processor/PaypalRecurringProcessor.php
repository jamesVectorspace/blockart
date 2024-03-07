<?php

/**
 * @package Paypal Recurring Processor
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 25-05-23
 */

namespace Modules\PaypalRecurring\Processor;

use Illuminate\Support\Facades\Cache;
use Modules\Gateway\Facades\GatewayHelper;
use Modules\Gateway\Contracts\{
    PaymentProcessorInterface,
    RequiresCallbackInterface,
    RequiresCancelInterface
};
use Modules\Gateway\Facades\GatewayHandler;
use Modules\PaypalRecurring\Entities\PaypalRecurring as EntitiesPaypalRecurring;
use Modules\PaypalRecurring\Response\PaypalRecurringResponse;
use Modules\Subscription\Services\PackageSubscriptionService;
use Modules\PaypalRecurring\Services\Paypal;
use Modules\Subscription\Entities\{
    Package,
    PaypalRecurring
};

class PaypalRecurringProcessor implements PaymentProcessorInterface, RequiresCallbackInterface, RequiresCancelInterface
{
    /**
     * @var array|object
     */
    private $paypalCredentials;

    /**
     * @var array|object
     */
    private $purchaseData;

    /**
     * @var string
     */
    private $purchaseCode;

    /**
     * @var object
     */
    private $paypal;

    /**
     * Payment method
     *
     * @param array|object $request
     * @return void
     */
    public function pay($request)
    {
        $this->setup();

        $package = Package::find($this->purchaseData?->sending_details?->package_id);

        $paypalProduct = $this->paypal->productCreate($package);

        if (!$paypalProduct?->id) {
            throw new \Exception(__('Something is wrong with Paypal Recurring. Please try again.'));
        }

        $paypalPlan = $this->paypal->createPlan($package, $paypalProduct->id);
        $paypalPlanId =  $paypalPlan?->id;

        if (!$paypalPlanId) {
            throw new \Exception(__('Something is wrong with Paypal Recurring. Please try again.'));
        }
        
        $response = $this->paypal->createSubscriptionUrl($paypalPlanId);
        Cache::put($response->id, request()->only(['to', 'payer', 'code', 'integrity']), 3600);

        if (!$response?->links) {
            throw new \Exception(__('Something is wrong with Paypal Recurring. Please try again.'));
        }

        $links = $response->links;

        foreach ($links as $link) {
            if ($link->rel == 'approve') {
                return redirect($link->href);
            }
        }
    }

    /**
     * Setup all needs
     *
     * @return void
     */
    private function setup()
    {
        $this->paypalCredentials = EntitiesPaypalRecurring::firstWhere('alias', 'paypalrecurring')->data;
        $this->purchaseCode = GatewayHelper::getPaymentCode();
        $this->purchaseData = GatewayHelper::getPurchaseData($this->purchaseCode);

        $this->paypal = new Paypal($this->paypalCredentials, $this->purchaseData);
    }

    /**
     * Transaction validate
     *
     * @param array|object $request
     * @return object
     */
    public function validateTransaction($request)
    {
        $queryData = $request->only('subscription_id', 'ba_token');
        if (!Cache::has($request->subscription_id)) {
            throw new \Exception(__('Purchase data not found.'));
        }
        request()->query->add(Cache::get($request->subscription_id));
        $this->setup();
        Cache::forget($queryData['subscription_id']);
        $response = new PaypalRecurringResponse($this->purchaseData, $request);
        $response->setUniqueCode($request->id);
        return $response;
    }

    /**
     * Cancel payment
     *
     * @param array|object $request
     * @return void
     */
    public function cancel($request)
    {
        throw new \Exception(__('Payment cancelled from paypal.'));
    }

    /**
     * Check validate payment
     * 
     * @param $request
     * @return boolean
     */
    public function validatePayment($request)
    {
        if ((new PackageSubscriptionService)->updatePaypalRecurring($request)) {
            return true;
        }
        return false;
    }
}
