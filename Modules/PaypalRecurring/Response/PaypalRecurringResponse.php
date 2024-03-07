<?php

/**
 * @package Paypal recurring response
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 31-05-23
 */

namespace Modules\PaypalRecurring\Response;

use Modules\Gateway\Response\Response;
use Modules\Gateway\Contracts\{
    HasDataResponseInterface
};

class PaypalRecurringResponse extends Response implements HasDataResponseInterface
{
    /**
     * @var array|object
     */
    protected $response;

    /**
     * @var array|object
     */
    private $purchaseData;

    /**
     * @var string|int
     */
    public $unique;

    /**
     * @var array
     */
    public $params;


    /**
     * Constructor of the response
     *
     * @param object|array $purchaseData
     * @param object|array $response (Payment response)
     */
    public function __construct($data, $response)
    {
        $this->purchaseData = $data;
        $this->response = $response;
        $this->updateStatus();
        return $this;
    }


    /**
     * Get Raw Response
     *
     * @return string
     */
    public function getRawResponse(): string
    {
        return json_encode($this->response);
    }

    /**
     * Update Payment Status
     *
     * @return void
     */
    public function updateStatus()
    {
        $this->setPaymentStatus('pending');
    }

    /**
     * Get Response
     *
     * @return string
     */
    public function getResponse(): string
    {
        return json_encode($this->getSimpleResponse());
    }

    /**
     * Get Simple Response
     *
     * @return array
     */
    public function getSimpleResponse()
    {
        return [
            'amount' => $this->purchaseData?->total,
            'amount_captured' => $this->purchaseData?->amount,
            'currency' => $this->purchaseData?->currency_code,
            'code' => $this->purchaseData?->code
        ];
    }

    /**
     * Get Gateway
     *
     * @return string
     */
    public function getGateway(): string
    {
        return 'PaypalRecurring';
    }

    /**
     * Set Payment Status
     *
     * @param string $status
     * @return void
     */
    public function setPaymentStatus($status):void
    {
        $this->status = $status;
    }

    /**
     * Set a unique code returned by the gateway while creating payment request/transaction
     *
     * @param mixed $code
     * @return void
     */
    public function setUniqueCode($code):void
    {
        $this->unique = $code;
    }

    /**
     * get a unique code
     *
     * @return string
     */
    public function getUniqueCode():string
    {
        return $this->unique;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl():string
    {
        return route('gateway.callback', withOldQueryIntegrity(['gateway' => 'paypalrecurring']));
    }

    /**
     * Set params
     *
     * @param array $array
     * @return void
     */
    public function setParams($array):void
    {
        $this->params = $array;
    }

    /**
     * Get params
     *
     * @return mixed
     */
    public function getParams():mixed
    {
        return $this->params;
    }
}
