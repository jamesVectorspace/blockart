<?php

namespace Modules\Flutterwave\Response;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class FlutterwaveResponse extends Response implements HasDataResponseInterface
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
     * Flutter wave Response Constructor
     *
     * @param object $data
     * @param object $response
     * @return void
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
        $this->response->status == 'successful' ? $this->setPaymentStatus('completed') : $this->setPaymentStatus('failed');
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
            'amount_captured' => $this->response->amount,
            'app_fee' => $this->response->app_fee,
            'charged_amount' => $this->response->charged_amount,
            'currency' => $this->response->currency,
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
        return 'Flutterwave';
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
