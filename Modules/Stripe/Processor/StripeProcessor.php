<?php

/**
 * @package StripeProcessor
 * @author TechVillage <support@techvill.org>
 * @contributor Muhammad AR Zihad <[zihad.techvill@gmail.com]>
 * @created 06-02-2022
 */

namespace Modules\Stripe\Processor;

use Modules\Gateway\Services\GatewayHelper;
use Modules\Stripe\Entities\Stripe as StripeModel;
use Modules\Stripe\Response\StripeResponse;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\Exception\AuthenticationException;
use Stripe\Exception\OAuth\InvalidRequestException;
use Modules\Gateway\Contracts\{
    PaymentProcessorInterface,
    RequiresCallbackInterface
};


class StripeProcessor implements PaymentProcessorInterface, RequiresCallbackInterface
{
    private $secret;
    private $key;
    private $helper;
    private $purchaseData;
    private $successUrl;
    private $cancelUrl;

    /**
     * Initialization
     *
     * @return void
     */
    public function __construct()
    {
        $this->helper = GatewayHelper::getInstance();
    }

    /**
     * Handles payment for stripe
     *
     * @param \Illuminate\Http\Request
     *
     * @return StripeResponse
     */
    public function pay($request)
    {
        $this->stripeSetup($request);

        $charge = $this->charge();
        if (!$charge) {
            throw new \Exception(__('Payment Request failed due to some issues. Please try again later.'));
        }

        $this->setStripeSessionId($charge->id);

        return redirect($charge->url);
    }


    /**
     * Stripe data setup
     *
     * @param \Illuminate\Http\Request
     *
     * return mixed
     */
    private function stripeSetup($request)
    {
        try {
            $this->key = $this->helper->getPaymentCode();
            $stripe = StripeModel::firstWhere('alias', 'stripe')->data;
            $this->secret = $stripe->clientSecret;
            $this->purchaseData = $this->helper->getPurchaseData($this->key);
            $this->successUrl = route(moduleConfig('gateway.payment_callback'), withOldQueryIntegrity(['gateway' => 'stripe']));
            $this->cancelUrl = route(moduleConfig('gateway.payment_cancel'), withOldQueryIntegrity(['gateway' => 'stripe']));
            Stripe::setApiKey($this->secret);

        } catch (\Exception $e) {
            paymentLog($e);
            throw new \Exception(__('Error while trying to setup stripe.'));
        }
    }


    /**
     * Create charge for payment
     *
     * @return mixed
     */
    private function charge()
    {
        try {
            return Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'product_data' => [
                                'name' => config('app.name') . ' Payment'
                            ],
                            'unit_amount' => round($this->purchaseData->total * 100, 0),
                            'currency' => $this->purchaseData->currency_code,
                        ],
                        'quantity' => 1,
                    ]
                ],
                'mode' => 'payment',
                'success_url' => $this->successUrl,
                'cancel_url' => $this->cancelUrl,
            ]);
        } catch (InvalidRequestException $e) {
            throw new \Exception(__('Payment Request failed due to some issues. Please try again later.'));
        } catch (AuthenticationException $e) {
            throw new \Exception(__('Payment Request failed due to credentials mismatch.'));
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    private function setStripeSessionId($id)
    {
        session([$this->key . 'stripe_session_id' => $id]);
    }

    private function getStripeSessionId()
    {
        return session($this->key . 'stripe_session_id');
    }

    public function validateTransaction($request)
    {
        $this->stripeSetup($request);
        $line_item = Session::retrieve($this->getStripeSessionId());

        return new StripeResponse($this->purchaseData, $line_item);
    }
}
