<?php

/**
 * @package StripeResponse
 * @author TechVillage <support@techvill.org>
 * @contributor Muhammad AR Zihad <[zihad.techvill@gmail.com]>
 * @created 06-02-2022
 */

namespace Modules\Stripe\Response;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class StripeResponse extends Response implements HasDataResponseInterface
{
    protected $response;
    private $purchaseData;

    /**
     * Initialization
     *
     * @return $this
     */
    public function __construct($purchaseData, $stripeResponse)
    {
        $this->purchaseData = $purchaseData;
        $this->response = $stripeResponse->jsonSerialize();
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
     * Update Status
     *
     * @return void
     */
    protected function updateStatus()
    {
        if ($this->response['status'] == 'complete') {
            $this->setPaymentStatus('completed');
        } else {
            $this->setPaymentStatus('failed');
        }
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
    private function getSimpleResponse()
    {
        return [
            'amount' => $this->response['amount_total'] / 100,
            'amount_captured' => $this->response['amount_total'] / 100,
            'currency' => $this->response['currency'],
            'code' => $this->purchaseData->code
        ];
    }

    /**
     * Get Gateway
     *
     * @return string
     */
    public function getGateway(): string
    {
        return 'Stripe';
    }

    /**
     * Set Payment Status
     *
     * @return void
     */
    protected function setPaymentStatus($status)
    {
        $this->status = $status;
    }
}
