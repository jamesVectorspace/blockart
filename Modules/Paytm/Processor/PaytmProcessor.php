<?php

/**
 * @package PaytmProcessor
 * @author techvillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 01-02-23
 */

namespace Modules\Paytm\Processor;

use Modules\Gateway\Services\GatewayHelper;
use Modules\Paytm\Entities\Paytm;
use Modules\Paytm\Library\EncdecPaytm;
use Modules\Paytm\Response\PaytmResponse;
use Modules\Gateway\Contracts\{
    PaymentProcessorInterface,
    RequiresCallbackInterface,
    RequiresCancelInterface
};

class PaytmProcessor implements PaymentProcessorInterface, RequiresCallbackInterface, RequiresCancelInterface
{
    private $paytm;
    private $helper;
    private $email;
    private $data;
    private $notify_url;
    private $domain = 'securegw-stage.paytm.in';
    private $validate_payload;
    private $payload;
    private $paytm_txn_url;
    private $paytm_txn_status_url;

    /**
     * Paytm processor constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->helper = GatewayHelper::getInstance();
    }

    /**
     *  Set initials data
     *
     * @return void
     */
    private function setupData()
    {
        $this->data = $this->helper->getPurchaseData($this->helper->getPaymentCode());
        $this->paytm = Paytm::firstWhere('alias', moduleConfig('paytm.alias'))->data;
        if (empty($this->paytm)) {
            throw new \Exception(__('At this moment this gateway is not available.'));
        }
        $this->notify_url = route('gateway.callback', withOldQueryIntegrity(['gateway' => 'paytm']));
        $this->setEnvironment();

    }


    /**
     *  Set payload data
     *
     * @return void
     */
    private function setPayload()
    {
        // Create an array having all required parameters for creating checksum.
        $this->payload = array(
            'MID' => $this->paytm->merchantId,
            'ORDER_ID' => 'MV'.time(),
            'CUST_ID' => 'MV'.time(),
            'INDUSTRY_TYPE_ID' => 'Retail',
            'CHANNEL_ID' => 'WEB',
            'TXN_AMOUNT' => number_format($this->data->total, 2),
            'WEBSITE' => $this->paytm->merchantId,
            'CALLBACK_URL' => $this->notify_url,
            'EMAIL' => $this->email,
        );
    }


    /**
    * Ajax payment
    *
    * @param object $request
    * @return payment view
    */
    public function pay($request)
    {
        if (!$request->email) {
            throw new \Exception('Email is required!');
        }
        $this->email = $request->email;

        
        $this->setupData();
        $this->setPayload();
        
        if (strtoupper($this->data->currency_code) != 'INR') {
            throw new \Exception(__('Currency not supported by merchant'));
        }
        
        //Here checksum string will return by getChecksumFromArray() function.
        $this->payload['CHECKSUMHASH'] = EncdecPaytm::getChecksumFromArray($this->payload, $this->paytm->merchantKey);

        return view('paytm::redirect', ['paramList' => $this->payload, 'url' => $this->paytm_txn_url]);
    }


    /**
     * Validate Transaction
     *
     * @param Request $request
     * @return PaytmResponse
     */
    public function validateTransaction($request)
    {

        $this->setupData();
        $paytmChecksum = isset($request->CHECKSUMHASH) ? $request->CHECKSUMHASH : "";

        if (!EncdecPaytm::verifychecksum_e($this->getResponse($request), $this->paytm->merchantKey, $paytmChecksum)) {
            throw new \Exception(__('Process transaction as suspicious.'));
        }

         if ('TXN_SUCCESS' <> $request->STATUS) {
            throw new \Exception($request->RESPMSG);
        }

        $this->setValidatePayload($request);

        $this->validate_payload['CHECKSUMHASH'] = EncdecPaytm::getChecksumFromArray($this->validate_payload, $this->paytm->merchantKey);


        // Call the PG's getTxnStatusNew() function for verifying the transaction status.
        $transaction = EncdecPaytm::getTxnStatusNew($this->validate_payload, $this->paytm_txn_status_url);

        if (!$transaction['STATUS']) {
            throw new \Exception($transaction['RESPMSG']);
        }

        if ('TXN_SUCCESS' <> $transaction['STATUS']) {
            throw new \Exception(__('Validation Failed.'));
        }

        return new PaytmResponse($this->data, $request);
    }


    /**
     * Cancel Payment
     *
     * @param object $request
     * @return void
     */
    public function cancel($request)
    {
        throw new \Exception(__('Payment cancelled from Paytm.'));
    }


    /**
     * Set validation data
     *
     * @param object $request
     * @return void
     */
    private function setValidatePayload($request)
    {
        $this->validate_payload = array(
            'MID' => $this->paytm->merchantId,
            'ORDERID' => $request->ORDERID
        );
    }


    /**
     * Set enviroment
     *
     * @return void
     */
    private function setEnvironment()
    {
        if (!$this->paytm->sandbox) {
            $this->domain = 'securegw-stage.paytm.in';
        }

        $this->setUrl();
    }


    /**
     * Set Urls
     *
     * @return void
     */
    private function setUrl()
    {
        $this->paytm_txn_url = 'https://' . $this->domain . '/theia/processTransaction';
        $this->paytm_txn_status_url = 'https://' . $this->domain . '/merchant-status/getTxnStatus';
    }

    /**
     *  Set response data
     *
     * @param response $response
     * @return array
     */
    private function getResponse($response)
    {
        
        return array(
            'ORDERID' => $response->ORDERID,
            'MID' => $response->MID,
            'TXNID' => $response->TXNID,
            'TXNAMOUNT' => $response->TXNAMOUNT,
            'PAYMENTMODE' => $response->PAYMENTMODE,
            'CURRENCY' => $response->CURRENCY,
            'TXNDATE' => $response->TXNDATE,
            'STATUS' => $response->STATUS,
            'RESPCODE' => $response->RESPCODE,
            'RESPMSG' => $response->RESPMSG,
            'GATEWAYNAME' => $response->GATEWAYNAME,
            'BANKTXNID' => $response->BANKTXNID,
            'BANKNAME' => $response->BANKNAME,
            'CHECKSUMHASH' => $response->CHECKSUMHASH,
        );
    }
}
