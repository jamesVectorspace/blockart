<?php

/**
 * @package MtnMomoProcessor
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <mostafijur.techvill@gmail.com>
 * @created 13-02-2023
 */

namespace Modules\MtnMomo\Processor;

use Modules\Gateway\Facades\GatewayHelper;
use Modules\Gateway\Contracts\{
    RequiresCancelInterface,
    PaymentProcessorInterface,
    RequiresCallbackInterface,
    RequiresWebHookValidationInterface
};
use Modules\MtnMomo\Entities\MtnMomo;
use Illuminate\Support\Str;
use Modules\Gateway\Entities\PaymentLog;
use Modules\MtnMomo\Response\MtnMomoResponse;

class MtnMomoProcessor implements PaymentProcessorInterface,RequiresWebHookValidationInterface, RequiresCallbackInterface, RequiresCancelInterface
{
    /**
     * Mtn Momo
     *
     * @var object
     */
    private $mtnMomo;

    /**
     * Helper
     *
     * @var object
     */
    private $helper;

    /**
     * Payload
     *
     * @var object
     */
    private $payload;

    /**
     * Environment
     *
     * @var string
     */
    private $environment;

    /**
     * Purchase Code
     *
     * @var string
     */
    private $purchaseCode;

    /**
     * Purchase Data
     *
     * @var object
     */
    private $purchaseData;

    /**
     * Reference Id
     *
     * @var string
     */
    private $xReferenceId;

    /**
     * Base URL
     *
     * @var string
     */
    private $baseUrl = 'https://sandbox.momodeveloper.mtn.com';

    /**
     * Access Data
     *
     * @var object
     */
    private $accessData;

    /**
     * Target Environment
     *
     * @var string
     */
    private $xTargetEnvironment;

    /**
     * Currency
     *
     * @var string
     */
    private $currency;

    /**
     * Request
     *
     * @var Request
     */
    private $request;

    /**
     * Notify URL
     *
     * @var string
     */
    private $notifyUrl;

    /**
     * Mtn Momo Processor Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->mtnMomo = MtnMomo::first()->data;
        $this->helper = GatewayHelper::getInstance();
        $this->notifyUrl = route('gateway.webhook', ['gateway' => 'mtnmomo']);
    }

    /**
     * Order amount payment.
     *
     * @param array $request
     * @return void
     */
    public function pay($request)
    {
        $this->request = $request;
        $this->setup();

        if (strtoupper($this->currency) == strtoupper($this->purchaseData->currency)) {
            throw new \Exception(__('Currency not supported by merchant'));
        }


        $this->accessTokenRequest();

        session()->put('mtn' . $this->purchaseCode, $this->xReferenceId);

        $this->setPayload();

        try {

            $result = $this->requestToPay();
            if ($result['code'] != 202 ) {
                throw new \Exception(__("MTN Momo payment request failed."));
            }

            $result = $this->requestToTransactionStatus($this->xReferenceId);

            if ($result['code'] != 200 ) {
                throw new \Exception(__("MTN Momo order retrieving failed."));
            }

        } catch (\Exception $e) {
            paymentLog($e);

            throw new \Exception(__("MTN Momo payment request failed."));
        }

        $response = new MtnMomoResponse($this->purchaseData, $result['response']);
        $response->setUniqueCode($this->xReferenceId);
        $response->setPaymentStatus('pending');
        return $response;

    }

    /**
     * Set necessary data
     *
     * @return void
     */
    private function setup()
    {
        $this->purchaseCode = $this->helper->getPaymentCode();
        $this->purchaseData = $this->helper->getPurchaseData($this->purchaseCode);
        $this->environment = $this->getEnvironment();
        $this->xReferenceId = $this->getUuid();
    }

    /**
     * Set environment
     *
     * @return void
     */
    private function getEnvironment()
    {
        if (!$this->mtnMomo->sandbox) {
            $this->setProduction();
        }

        $this->xTargetEnvironment = config("mtnmomo.sandbox")['xTargetEnvironment'];
        $this->currency = config("mtnmomo.sandbox")['currency'];
    }

    /**
     * Set Production environment.
     *
     * @return void
     */
    private function setProduction()
    {
        $this->baseUrl = 'https://proxy.momoapi.mtn.com';
        $this->xTargetEnvironment = config("mtnmomo." . $this->mtnMomo->country . "xTargetEnvironment");
        $this->currency = config("mtnmomo." . $this->mtnMomo->country)['currency'];
    }


    /**
     * Check transaction validation
     *
     * @param array|mix $request
     * @return array|mix
     */
    public function validateTransaction($request)
    {
        $this->setup();
        $this->accessTokenRequest();
        $xReferenceId = session()->get('mtn' . $this->helper->getPaymentCode());

        try {

            $result = $this->requestToTransactionStatus($xReferenceId);

            if ($result['code'] != 200 ) {
                throw new \Exception("MTN Momo order retrieving failed!");
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return new MtnMomoResponse($this->purchaseData, $result['response']);
    }

    /**
     * Payment cancel method
     *
     * @param array $request
     * @return void
     */
    public function cancel($request)
    {
        throw new \Exception(__('Payment cancelled from Mtn Momo.'));
    }

    /**
     * Set payload data.
     *
     * @return void
     */
    private function setPayload()
    {
        $this->payload = array(
            'amount' => $this->purchaseData->total,
            'currency' => $this->currency,
            'externalId' => $this->purchaseCode,
            'payer' => [
                'partyIdType' => 'MSISDN',
                'partyId' => $this->request->phone,
            ],
            'payerMessage' => 'Payment by Mtn Momo',
            'payeeNote' => $this->xReferenceId
        );
    }

    /**
     * Get uuid version 4
     *
     * @return string uuid
     */
    private function getUuid()
    {
        return (string) Str::uuid();
    }

    /**
     * Create access token.
     *
     * @return void
     */
    private function accessTokenRequest()
    {
        $url = $this->baseUrl . '/collection/token/';

        $header = [
            "authorization: Basic " . base64_encode($this->mtnMomo->userApiId . ":" . $this->mtnMomo->userApiKey),
            "Ocp-Apim-Subscription-Key:" . $this->mtnMomo->ocpApimSubscriptionKey,
        ];

        $result = $this->callToApi($url, $header);

        if ($result['code'] != 200) {
            throw new \Exception(__("MTN Momo payment request failed!"));
        }

        $this->accessData = $result['response'];
    }

    /**
     * Request to pay
     *
     * @return array
     */
    private function requestToPay()
    {
        $url = $this->baseUrl . '/collection/v1_0/requesttopay';

        $header = [
            "Authorization: Bearer " . $this->accessData->access_token,
            "X-Reference-Id: " . $this->xReferenceId,
            "X-Target-Environment: " . $this->xTargetEnvironment,
            "X-Callback-Url: ". $this->notifyUrl,
            "Ocp-Apim-Subscription-Key: " . $this->mtnMomo->ocpApimSubscriptionKey,
            "Content-Type: application/json"
        ];

        return $this->callToApi($url, $header, $this->payload);
    }

    /**
     * Request to transaction Status
     *
     * @param string $xReferenceId
     * @return array
     */
    public function requestToTransactionStatus($xReferenceId)
    {
        $url = $this->baseUrl . '/collection/v1_0/requesttopay/'. $xReferenceId;

        $header = [
            "Authorization: Bearer " . $this->accessData->access_token,
            "X-Target-Environment: " . $this->xTargetEnvironment,
            "Ocp-Apim-Subscription-Key: " . $this->mtnMomo->ocpApimSubscriptionKey,
        ];

        return $this->getApiResponse($url, $header);
    }

    /**
     * Call API
     *
     * @param String $url
     * @param array $header
     * @param array|mix $postData
     * @return array|mix
     */
    private  function callToApi($url, $header, $postData = null)
    {
        $jsonPostData = json_encode($postData);

        // # Perform a GET request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        # It is important to keep no spaces here in header when concatenating
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);

        if ($postData) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPostData);
        }

        # Disabling SSL verification in sandbox mode
        if ($this->mtnMomo->sandbox == 1) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        $response = json_decode(curl_exec($ch));
        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        return [
            "response" => $response,
            "code" => $httpStatusCode
        ];

    }

    /**
     * Check validate payment
     *
     * @param $request
     * @return boolean
     */
    public function validatePayment($request)
    {
        if ($request->status) {

            $payment = PaymentLog::uniqueCode($request->externalId)->first();

            if (!$payment) {
                paymentLog($request);
                paymentLog('------ Payment data with the requested mtn unique code ("field: custom") -------');
                return false;
            }

            $payment->response_raw = json_encode($request->all());

            if ($request->status == 'SUCCESSFULL') {

                $payment->status = 'completed';
                $payment->response = json_encode($request->all());

            } else {
                $payment->status = 'cancelled';
            }

            $payment->store();

            return true;
        }
        return false;
    }

    /**
     * Call transaction status api
     *
     * @param String $url
     * @param array $header
     * @return array|mix
     */
    public function getApiResponse($url, $header)
    {


        # Perform a GET request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        # It is important to keep no spaces here in header when concatenating
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        # Disabling SSL verification in sandbox mode
        if ($this->mtnMomo->sandbox == 1) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        $response = json_decode(curl_exec($ch));
        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        return [
            "response" => $response,
            "code" => $httpStatusCode
        ];
    }
}
