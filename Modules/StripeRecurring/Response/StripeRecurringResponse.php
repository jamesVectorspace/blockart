<?php

/**
 * @package StripeRecurringResponse
 * @author TechVillage <support@techvill.org>
 * @contributor Md Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 15-05-2023
 */

namespace Modules\StripeRecurring\Response;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class StripeRecurringResponse extends Response implements HasDataResponseInterface
{
    /**
     * @var array|object
     */
    protected $response;

    /**
     * @var array|object
     */
    private $data;

    /**
     * Constructor for stripe recurring response
     *
     * @param array|object $data
     * @param array|object $stripeResponse
     * @return void
     */
    public function __construct($data, $stripeResponse)
    {
        $this->data = $data;
        $this->response = $stripeResponse->jsonSerialize();
        $this->updateStatus();
        return $this;
    }

    /**
     * Get raw response
     *
     * @return string
     */
    public function getRawResponse(): string
    {
        return json_encode($this->response);
    }

    /**
     * Update payment status
     *
     * @return void
     */
    protected function updateStatus():void
    {
        if ($this->response['status'] == 'succeeded') {
            $this->setPaymentStatus('completed');
        } else {
            $this->setPaymentStatus('failed');
        }
    }

    /**
     * Get response
     *
     * @return string
     */
    public function getResponse(): string
    {
        return json_encode($this->getSimpleResponse());
    }

    /**
     * Get simple response
     *
     * @return array
     */
    private function getSimpleResponse():array
    {
        return [
            'amount' => $this->data->total,
            'amount_captured' => $this-> response['plan']['amount_decimal'] / 100,
            'currency' => $this->response['currency'],
            'code' => $this->data->code
        ];
    }

    /**
     * Get gateway name
     *
     * @return string
     */
    public function getGateway(): string
    {
        return 'StripeRecurring';
    }

    /**
     * Set payment status
     *
     * @param string $status
     * @return void
     */
    protected function setPaymentStatus($status):void
    {
        $this->status = $status;
    }
}
