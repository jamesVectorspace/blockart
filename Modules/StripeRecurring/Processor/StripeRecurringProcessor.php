<?php

/**
 * @package StripeRecurringProcessor
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 09-05-2023
 */

namespace Modules\StripeRecurring\Processor;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\Gateway\Contracts\PaymentProcessorInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Stripe\Response\StripeResponse;
use Modules\StripeRecurring\Entities\StripeRecurring;
use Modules\StripeRecurring\Response\StripeRecurringResponse;
use Modules\Subscription\Entities\{
    Package,
    PackageMeta,
    PackageSubscription,
    PackageSubscriptionMeta,
    SubscriptionDetails,
};
use Modules\Subscription\Services\PackageSubscriptionService;
use Stripe\Stripe;

class StripeRecurringProcessor implements PaymentProcessorInterface
{
    /**
     * Gateway helper instance
     *
     * @var object
     */
    private $helper;

    /**
     * Purchase data
     *
     * @var object|mix
     */
    private $purchaseData;

    /**
     * stripe token
     *
     * @var string
     */
    private $token;

    /**
     * stripe recurring secret key
     *
     * @var string
     */
    private $secret;

    /**
     * stripe recurring
     *
     * @var Object
     */
    private $stripeRecurring;

    /**
     * purchase key
     *
     * @var string
     */
    private $key;

    /**
     * user
     *
     * @var object
     */
    private $user;

    /**
     * customer
     *
     * @var object|array
     */
    private $customer;

    /**
     * plan
     *
     * @var object|array
     */
    private $plan;

    /**
     * plan interval
     *
     * @var array
     */
    private $planInterval = ['days' => 'day', 'weekly' => 'week', 'monthly' => 'month', 'yearly' => 'year'];

    /**
     * Constructor for stripe recurring processor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->helper = GatewayHelper::getInstance();
    }

    /**
     * Handles payment for stripe recurring
     *
     * @param \Illuminate\Http\Request
     *
     * @return StripeResponse
     */
    public function pay($request)
    {
        $this->stripeSetup($request);

        if (!$this->purchaseData?->sending_details?->package_id) {
            throw new \Exception(__("Something is wrong with Stripe Recurring. Please try again."));
        }

        $package = Package::find($this->purchaseData?->sending_details?->package_id);

        if (!$this->user?->stripe_customer_id) {
            $this->customer =  $this->customerCreate();
        }

        $this->plan = $this->planCreate($package, $package->duration);

        // Creates a new subscription 
        try {
            $subscription = \Stripe\Subscription::create(array(
                "customer" => $this->user?->stripe_customer_id,
                "items" => array(
                    array(
                        "plan" => $package->stripe_plan_id,
                    ),
                ),
                "trial_period_days" => $package->trial_day ?? null
            ));
        } catch (\Exception $e) {
            $api_error = $e->getMessage();
        }
        $this->storeSubscriptionId($subscription->id);

        return new StripeRecurringResponse($this->purchaseData, $subscription);
    }

    /**
     * Stripe data setup
     *
     * @param \Illuminate\Http\Request
     *
     * return void
     */
    private function stripeSetup($request):void
    {
        try {
            $this->key = $this->helper->getPaymentCode();
            $this->purchaseData = $this->helper->getPurchaseData($this->key);
            $this->stripeRecurring = StripeRecurring::firstWhere('alias', 'striperecurring')->data;
            $this->secret = $this->stripeRecurring->clientSecret;
            $this->token = $request->stripeToken;
            $this->user = User::find(Auth::user()->id);
            Stripe::setApiKey($this->secret);
        } catch (\Exception $e) {
            paymentLog($e);
            throw new \Exception(__('Error while trying to setup stripe.'));
        }
    }

    /**
     * Customer create for stripe
     *
     * @return void
     */
    public function customerCreate():void
    {
        // Add customer to stripe 
        $customer = \Stripe\Customer::create(array(
            'email' => $this->user->email,
            'source'  => $this->token
        ));

        if (!$customer?->id) {
            throw new \Exception(__("Something is wrong with Stripe Recurring. Please try again."));
        }

        $this->user->setMeta(['stripe_customer_id' => $customer->id]);
        $this->user->save();
    }

    /**
     * Plan create
     *
     * @param Object $package
     * @return $plan
     */
    public function planCreate(Object $package, $packageIntervalCount):mixed
    {
        if (!$this->purchaseData?->sending_details?->billing_price || !$this->purchaseData?->currency_code || !$this->purchaseData?->sending_details?->billing_cycle) {
            throw new \Exception(__("Something is wrong with Stripe Recurring. Please try again."));
        }
        // Convert price to cents 
        $priceCents = round($this->calculatePrice($package) * 100);
        $plan = \Stripe\Plan::create(array(
            "product" => [
                "name" => $package->name
            ],
            "amount" => $priceCents,
            "currency" => $this->purchaseData->currency_code,
            "interval" => $this->planInterval[$this->purchaseData?->sending_details?->billing_cycle],
            "interval_count" => $packageIntervalCount ?? 1
        ));

        if (!$package?->id) {
            throw new \Exception(__("Something is wrong with Stripe Recurring. Please try again."));
        }

        $meta[] = [
            'package_id' => $package->id,
            'feature' =>  '',
            'key' => 'stripe_plan_id',
            'value' => $plan->id
        ];

        PackageMeta::upsert($meta, ['package_id', 'key']);
        return $plan;
    }

    /**
     * Stripe subscription id store
     *
     * @param string $stripeSubscriptionId
     * @return void
     */
    public function storeSubscriptionId(string $stripeSubscriptionId)
    {
        $subscription = PackageSubscription::where('code', $this->purchaseData?->sending_details?->code)->first();
        $meta[] = [
            'package_subscription_id' => $subscription->id,
            'key' => 'stripe_subscription_id',
            'value' => $stripeSubscriptionId
        ];
        PackageSubscriptionMeta::upsert($meta, ['package_subscription_id', 'key']);
    }

    /**
     * Check validate payment
     * 
     * @param $request
     * @return boolean
     */
    public function validatePayment($request)
    {
        if ((new PackageSubscriptionService)->updateRecurring($request)) {
            return true;
        }
        return false;
    }

    private function calculatePrice($package)
    {
        $price = $package->sale_price[$this->purchaseData?->sending_details?->billing_cycle];

        if (!is_null($package->discount_price[$this->purchaseData?->sending_details?->billing_cycle]) || $package->discount_price[$this->purchaseData?->sending_details?->billing_cycle] != 0) {
            $price = $package->discount_price[$this->purchaseData?->sending_details?->billing_cycle];
        }


        $couponAmount = SubscriptionDetails::where('code', $this->purchaseData?->sending_details?->code)
        ->latest('created_at')
        ->withSum('couponRedeem', 'discount_amount')
        ->first();

        if ($couponAmount) {
            return $price - $couponAmount->coupon_redeem_sum_discount_amount;
        }

        return $price;
    }
}
