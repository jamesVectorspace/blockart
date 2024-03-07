<?php

namespace Modules\Instamojo\Processor;

use Modules\Gateway\Contracts\PaymentProcessorInterface;
use Modules\Gateway\Contracts\RequiresCallbackInterface;
use Modules\Gateway\Facades\GatewayHelper;
use Modules\Instamojo\Entities\Instamojo;
use Modules\Instamojo\Response\InstamojoResponse;

class InstamojoProcessor implements PaymentProcessorInterface, RequiresCallbackInterface
{

    /**
     * Instamojo
     *
     * @var object
     */
    private $instamojo;

    /**
     * Data
     *
     * @var object
     */
    private $data;

    /**
     * URL
     *
     * @var string
     */
    private $url = 'https://test.instamojo.com/api/1.1/';

    /**
     * Payload
     *
     * @var object
     */
    private $payload;

    /**
     * Pay
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector
     */
    public function pay($request)
    {
        $this->setup();
        $this->setPayload($request);
        return redirect($this->paymentRequest());
    }

    /**
     * Setup
     *
     * @return void
     */
    private function setup()
    {
        $this->setInstamojo();
        $this->setPurchaseDate();
    }

    /**
     * Set Purchase
     *
     * @return void
     */
    private function setPurchaseDate()
    {
        $this->data = GatewayHelper::getPurchaseData(GatewayHelper::getPaymentCode());
    }

    /**
     * Set Instamojo
     *
     * @return void
     */
    private function setInstamojo()
    {
        $this->instamojo = Instamojo::first()->data;
        $this->setEnvironment();
    }

    /**
     * Payment Request
     *
     * @return string
     */
    public function paymentRequest()
    {
        $response = $this->curlRequest('payment-requests');
        $response = json_decode($response);
        if (!$response->success) {
            paymentLog('Instamojo::' . json_encode($response->message));
            throw new \Exception(__('Couldn\'t initiate the payment.'));
        }
        return $response->payment_request->longurl;
    }

    /**
     * Set Environment
     *
     * @return void
     */
    private function setEnvironment()
    {
        if (!$this->instamojo->sandbox) {
            $this->setProduction();
        }
    }

    /**
     * Set Production
     *
     * @return void
     */
    private function setProduction()
    {
        $this->setUrl('https://www.instamojo.com/api/1.1/');
    }

    /**
     * Set URL
     *
     * @param string $url
     * @return void
     */
    private function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Set Payload
     *
     * @param Request $request
     * @return void
     */
    private function setPayload($request)
    {
        $this->payload = json_encode([
            "amount" => round($this->data->total, 2),
            "purpose" => "purchase",
            "currency" => $this->data->currency_code,
            "buyer_name" => $request->name,
            "email" => $request->email,
            "redirect_url" => route(moduleConfig('gateway.payment_callback'), withOldQueryIntegrity(['gateway' => 'instamojo'])),
            "allow_repeated_payments" => false,
            "send_email" => true,
        ]);
    }

    /**
     * Get URL
     *
     * @param string $action
     * @return string
     */
    private function getUrl($action)
    {
        return $this->url . $action . '/';
    }

    /**
     * CURL Request
     *
     * @parma string $action
     * @return string|bool
     */
    public function curlRequest($action)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getUrl($action),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_SSL_VERIFYHOST => moduleConfig('instamojo.ssl_verify_host'),
            CURLOPT_SSL_VERIFYPEER => moduleConfig('instamojo.ssl_verify_peer'),
            CURLOPT_POSTFIELDS => $this->payload,
            CURLOPT_HTTPHEADER => [
                "X-Api-Key: " . $this->instamojo->apiKey,
                "X-Auth-Token: " . $this->instamojo->authToken,
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));

        return curl_exec($curl);
    }

    /**
     * Get Payment
     *
     * @param string @action
     * @return string|bool
     */
    public function getPayment($action)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getUrl($action),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => [
                "X-Api-Key: " . $this->instamojo->apiKey,
                "X-Auth-Token: " . $this->instamojo->authToken,
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));
        return curl_exec($curl);
    }

    /**
     * Payment Validate
     *
     * @param Request $request
     * @return string|bool
     */
    private function paymentValidate($request)
    {
        if ($request->payment_status == 'Failed') {
            throw new \Exception(__('Payment failed.'));
        }
        $response = $this->getPayment('payment-requests/' . $request->payment_request_id . '/' . $request->payment_id);
        $response = json_decode($response);
        if (!$response->success) {
            paymentLog($response);
            throw new \Exception(__('Payment could not be verified.'));
        }
        if (!$response->payment_request->status == 'Completed') {
            paymentLog($response);
            throw new \Exception(__('Payment is not completed.'));
        }

        return $response;
    }

    /**
     * Validate Transaction
     *
     * @param Request $request
     * @return response
     */
    public function validateTransaction($request)
    {
        $this->setInstamojo();
        $this->setPurchaseDate();
        $response = $this->paymentValidate($request);
        return new InstamojoResponse($this->data, $response);
    }
}
