<?php

/**
 * @package YukassaProcessor
 * @author techvillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 21-11-23
 */

namespace Modules\YuKassa\Processor;

use Illuminate\Support\Facades\Cache;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Gateway\Contracts\{
    PaymentProcessorInterface,
    RequiresCallbackInterface,
    RequiresCancelInterface,
};
use Modules\Subscription\Services\PackageSubscriptionService;
use Modules\YuKassa\Entities\YuKassa;
use Modules\YuKassa\Response\YuKassaResponse;
use YooKassa\Client;

class YuKassaProcessor implements PaymentProcessorInterface, RequiresCallbackInterface, RequiresCancelInterface
{
    /**
     * yukassa credentials
     */
    private $yukassa;

    /**
     * yukassaClient 
     */
    private $yukassaClient;

    /**
     * Gateway helper instance
     */
    private $helper;

    /**
     * Customer purchase data
     */
    private $purchaseData;


    /**
     * Notify url
     */
    private $notifyUrl;

    /**
     * Payload
     */
    private $payload;


    /**
     * Paytr processor constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->yukassa = YuKassa::firstWhere('alias', moduleConfig('yukassa.alias'))->data;
        $this->yukassaClient = new Client();
        $this->yukassaClient->setAuth($this->yukassa->storeId, $this->yukassa->secretKey);
        $this->notifyUrl = route('gateway.callback', withOldQueryIntegrity(['gateway' => moduleConfig('yukassa.alias')]));
       
    }

    /**
     * Ajax payment
     *
     * @param object $request
     * @return payment view
     */
    public function pay($request)
    {
        $this->setEnvironment();

        if (strtoupper($this->purchaseData->currency_code) != 'RUB') {
            throw new \Exception(__('Currency not supported by merchant'));
        }

        $response = $this->yukassaClient->createPayment(
            $this->payload,
            uniqid('', true)
        );

        if (!$response->confirmation->confirmation_url) {
           throw new \Exception(__('There seems to be an issue. Please attempt the action again.'));
           
        }

        Cache::put($this->purchaseData->code, $response->id, 3600);

        return redirect($response?->confirmation?->confirmation_url);
    }


    /**
     * Validate Transaction
     *
     * @param Request $request
     * @return YuKassaResponse
     */
    public function validateTransaction($request)
    {
        $this->setEnvironment();

        if (!Cache::has($this->purchaseData->code)) {
            throw new \Exception(__('Purchase data not found.'));
        }

        $paymentId = Cache::get($this->purchaseData->code);
        $paymentInfo = $this->yukassaClient->getPaymentInfo($paymentId);
        Cache::forget($this->purchaseData->code);
        return new YuKassaResponse($this->purchaseData, $paymentInfo);
    }


    /**
     * Cancel Payment
     *
     * @param object $request
     * @return void
     */
    public function cancel($request)
    {
        throw new \Exception(__('Payment cancelled from YuKassa.'));
    }


    /**
     * Set environment
     *
     * @return void
     */
    private function setEnvironment(): void
    {
        $this->helper = GatewayHelper::getInstance();
        $this->purchaseData = $this->helper->getPurchaseData($this->helper->getPaymentCode());
        $this->setPayload();
    }

    /**
     * Setup the payload values
     */
    private function setPayload(): void
    {
        $this->payload = [
            'amount' => [
                'value' => $this->purchaseData->total,
                'currency' => $this->purchaseData->currency_code,
            ],
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => $this->notifyUrl,
            ],
            'capture' => true,
            'description' => $this->purchaseData->code,
            'metadata' => [
                'order_id' => $this->purchaseData->code,
                'user_id' => $this->purchaseData->sending_details->user_id
            ]
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
        if ((new PackageSubscriptionService)->updateYukassaPayment($request)) {
            return true;
        }
        return false;
    }
}
