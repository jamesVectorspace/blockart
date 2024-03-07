<?php

/**
 * @package NGeniusProcessor
 * @author TechVillage <support@techvill.org>
 * @contributor Soumik Datta <soumik.techvill@gmail.com>
 * @created 17-01-2023
 */

namespace Modules\NGenius\Processor;

use Modules\NGenius\Entities\NGenius;
use Modules\Gateway\Facades\GatewayHelper;
use Modules\Gateway\Contracts\RequiresCancelInterface;
use Modules\Gateway\Contracts\PaymentProcessorInterface;
use Modules\Gateway\Contracts\RequiresCallbackInterface;
use Modules\NGenius\Processor\Core\SandboxEnvironment;
use Modules\NGenius\Processor\Core\ProductionEnvironment;
use Modules\NGenius\Processor\Core\OrdersCreateRequest;
use Modules\NGenius\Processor\Core\OrdersRetrieveRequest;
use Modules\NGenius\Processor\Core\NGeniusResponse;


class NGeniusProcessor implements PaymentProcessorInterface, RequiresCallbackInterface, RequiresCancelInterface
{
    /**
     * nGenius
     *
     * @var object
     */
    private $nGenius;

    /**
     * Payment Log
     *
     * @var string
     */
    private $paymentLog;

    /**
     * Order reference code
     *
     * @var string
     */
    private $orderReferenceCode;

    /**
     * Environment
     *
     * @var string
     */
    private $environment;

    /**
     * Pay
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector
     */
    public function pay($request)
    {
        $this->setup();

        try {
            $orderRequest = new OrdersCreateRequest($this->environment, $this->orderReferenceCode, $this->paymentLog, $this->nGenius->outletReference);
            $result = $orderRequest->getApiResponse();

            if (!($result['code'] >= 200 && $result['code'] < 300)) {
                throw new \Exception("N-Genius order creation failed!");
            }
        } catch (\Exception $e) {
            paymentLog($e);
            throw new \Exception(__("N-Genius payment request failed."));
        }

        $response = $result['response'];
        $this->setNGeniusOrderReference($response["reference"]);
        $payPageUrl = $response["_links"]["payment"]["href"];

        return redirect($payPageUrl);
    }

    /**
     * Setup
     *
     * @return void
     */
    private function setup()
    {
        $this->nGenius = (new NGenius)->first()->data;
        $this->orderReferenceCode = GatewayHelper::getPaymentCode();
        $this->paymentLog = GatewayHelper::getPurchaseData($this->orderReferenceCode);
        $this->environment = $this->getEnvironment();
    }

    /**
     * Get Environment
     *
     * @return void
     */
    private function getEnvironment()
    {
        if (!$this->nGenius->sandbox) {
            return new ProductionEnvironment($this->nGenius->apiKey);
        }
        return new SandboxEnvironment($this->nGenius->apiKey);
    }

    /**
     * Set NGenius Order Reference
     *
     * @param string $reference
     * @return void
     */
    private function setNGeniusOrderReference(string $reference)
    {
        session(['ngenius_order_reference' => $reference]);
    }

    /**
     * get NGenius Order Reference
     *
     * @return string
     */
    private function getNGeniusOrderReference()
    {
        return session('ngenius_order_reference');
    }

    /**
     * Validate Transaction
     *
     * @param Request $request
     * @return $this
     */
    public function validateTransaction($request)
    {
        $this->setup();

        try {
            $orderRetrieveRequest = new OrdersRetrieveRequest($this->environment, $this->nGenius->outletReference, $this->getNGeniusOrderReference());
            $result = $orderRetrieveRequest->getApiResponse();

            if (!($result['code'] >= 200 && $result['code'] < 300)) {
                throw new \Exception("N-Genius order retrieving failed!");
            }
        } catch (\Exception $e) {
            paymentLog($e);
            throw new \Exception($e->getMessage());
        }

        return new NGeniusResponse($this->paymentLog, $result['response']);
    }

    /**
     * Cancel
     *
     * @param Request $request
     * @return void
     */
    public function cancel($request)
    {
        throw new \Exception(__('Payment cancelled from N-Genius.'));
    }
}
