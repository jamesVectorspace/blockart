<?php

/**
 * @package PaystackProcessor
 * @author TechVillage <support@techvill.org>
 * @contributor Muhammad AR Zihad <[zihad.techvill@gmail.com]>
 * @created 14-2-22
 */

namespace Modules\Paystack\Processor;

use Modules\Gateway\Contracts\PaymentProcessorInterface;
use Modules\Gateway\Contracts\RequiresCallbackInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Paystack\Entities\Paystack;
use Modules\Paystack\Response\PaystackResponse;

class PaystackProcessor implements PaymentProcessorInterface, RequiresCallbackInterface
{
    private $paystack;
    private $helper;
    private $email;
    private $data;

    /**
     * Constructor for paystack processor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->helper = GatewayHelper::getInstance();
    }

    /**
     * Setup initials data
     *
     * @return void
     */
    private function setupData()
    {
        $this->data = $this->helper->getPurchaseData($this->helper->getPaymentCode());

        $this->paystack = Paystack::firstWhere('alias', moduleConfig('paystack.alias'))->data;
    }

    /**
     * Handles payment for paystack
     *
     * @param Request $request
     * @return mixed
     */
    public function pay($request)
    {
        if (!$request->email) {
            throw new \Exception('Email is required!');
        }
        $this->email = $request->email;

        $this->setupData();

        return $this->curlPaymentRequest();
    }

    /**
     * Curl request for payment
     *
     * @return mixed
     */
    private function curlRequestForPayment()
    {
        $curl = curl_init();

        $amount = round($this->data->total * 100, 0);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_SSL_VERIFYHOST => moduleConfig('paystack.ssl_verify_host'),
            CURLOPT_SSL_VERIFYPEER => moduleConfig('paystack.ssl_verify_peer'),
            CURLOPT_POSTFIELDS => json_encode([
                'amount' => $amount,
                'email' => $this->email,
                'currency' => $this->data->currency_code,
                'callback_url' => route(moduleConfig('gateway.payment_callback'), withOldQueryIntegrity(['gateway' => 'paystack']))
            ]),
            CURLOPT_HTTPHEADER => [
                "authorization: Bearer " . $this->paystack->secretKey,
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));

        return curl_exec($curl);
    }

    /**
     * Curl payment request
     *
     * @return mixed
     */
    private function curlPaymentRequest()
    {

        $response = $this->curlRequestForPayment();

        $transaction = json_decode($response, true);

        if (!$transaction['status']) {

            throw new \Exception($transaction['message']);
        }

        $this->setTransactionSession($transaction['data']);

        return redirect($transaction['data']['authorization_url']);
    }

    /**
     * Set transaction session for reference
     *
     * @param Array|mixed $transaction
     * @return void
     */
    private function setTransactionSession($transaction)
    {
        session([
            $this->helper->getPaymentCode() . '-paystack' => json_encode([
                'ref' => $transaction['reference']
            ])
        ]);
    }

    /**
     * Get payment reference
     *
     * @return mixed
     */
    private function getPaymentRef()
    {
        return json_decode(session($this->helper->getPaymentCode() . '-paystack'));
    }

    /**
     * Validate transaction.
     *
     * @param Request $request
     * @return PaystackResponse
     */
    public function validateTransaction($request)
    {
        $this->setupData();

        $reference = $request->reference;

        if (!$reference) {
            throw new \Exception('No reference supplied.');
        }

        $sessionRef = $this->getPaymentRef();

        if ($reference <> $sessionRef->ref) {
            throw new \Exception('Reference doesn\'t match with the order.');
        }

        $curlResponse = $this->curlRequestForValidation($reference);

        $transaction = json_decode($curlResponse);

        if (!$transaction->status) {
            throw new \Exception($transaction->message);
        }

        if ('success' <> $transaction->data->status) {
            throw new \Exception('Validation Failed.');
        }

        return new PaystackResponse($this->data, $transaction->data);
    }

    /**
     * Curl request for validation
     *
     * @param String|Mixed $reference
     * @return Mixed
     */
    private function curlRequestForValidation($reference)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer " . $this->paystack->secretKey,
                "cache-control: no-cache"
            ],
        ));
        return curl_exec($curl);
    }
}
