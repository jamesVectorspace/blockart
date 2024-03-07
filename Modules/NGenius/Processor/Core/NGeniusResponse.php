<?php

namespace Modules\NGenius\Processor\Core;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;


class NGeniusResponse extends Response implements HasDataResponseInterface
{
    /**
     * Response
     *
     * @var object
     */
    protected $response;

    /**
     * Data
     *
     * @var object
     */
    private $data;

    /**
     * Constructor of the response
     *
     * @param object $data (PaymentLog model object)
     * @param object $response (Payment gateway response)
     */
    public function __construct($data, $response)
    {
        $this->data = $data;
        $this->response = $response;
        $this->updateStatus();
        return $this;
    }

    /**
     * Get Response
     *
     * @return string
     */
    public function getResponse(): string
    {
        # Divided by 100 to get back original amount (from amount in minor units).
        # If property is not set, as we can't verify, default is ZERO.
        $amountCaptured = isset($this->response->_embedded->payment[0]->amount->value) ? ($this->response->_embedded->payment[0]->amount->value / 100) : 0;

        $formattedResponse = [
            'amount' => $this->data->total,
            'amount_captured' => $amountCaptured,
            'currency' => isset($this->response->_embedded->payment[0]->amount->currencyCode) ? $this->response->_embedded->payment[0]->amount->currencyCode : 'NULL',
            'code' => $this->data->code
        ];

        return json_encode($formattedResponse);
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
     * Set Payment Status
     *
     * @param string $status
     * @return void
     */
    protected function setPaymentStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get Gateway
     *
     * @return string
     */
    public function getGateway(): string
    {
        return 'N-Genius';
    }

    /**
     * Update Status
     *
     * @return void
     */
    protected function updateStatus()
    {
        if (isset($this->response->_embedded->payment[0]->state) && $this->response->_embedded->payment[0]->state == 'PURCHASED') {
            $this->setPaymentStatus('completed');
        } else {
            $this->setPaymentStatus('failed');
        }
    }
}
