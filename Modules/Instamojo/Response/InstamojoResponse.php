<?php

namespace Modules\Instamojo\Response;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class InstamojoResponse extends Response implements HasDataResponseInterface
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
     * Instamojo Response Constructor
     *
     * @param object $data
     * @param object @response
     * @return $this
     */
    public function __construct($data, $response)
    {
        $this->data = $data;
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
     * Update Status
     *
     * @return void
     */
    protected function updateStatus()
    {
        if ($this->response->payment_request->status == 'Completed') {
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
            'amount' => $this->data->total,
            'amount_captured' => $this->response->payment_request->payment->amount,
            'currency' => $this->response->payment_request->payment->currency,
            'code' => $this->data->code
        ];
    }

    /**
     * Get Gateway
     *
     * @return string
     */
    public function getGateway(): string
    {
        return 'Instamojo';
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
}
