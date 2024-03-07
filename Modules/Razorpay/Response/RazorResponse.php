<?php

namespace Modules\Razorpay\Response;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class RazorResponse extends Response implements HasDataResponseInterface
{
    /**
     * Initialization
     *
     * @return void
     */
    public function __construct($data, $response)
    {
        $this->data = $data;
        $this->response = $response;
        $this->setPaymentStatus('completed');
        return $this;
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
        return 'razorpay';
    }

    /**
     * Get Raw Response
     *
     * @return string|false
     */
    public function getRawResponse(): string
    {
        return json_encode($this->response);
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
            'amount' => $this->data->total,
            'amount_captured' => $this->data->total,
            'currency' => $this->data->currency_code,
            'code' => $this->data->code
        ];
    }
}
