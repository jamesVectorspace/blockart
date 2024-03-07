<?php


namespace Modules\Esewa\Response;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class EsewaResponse extends Response implements HasDataResponseInterface
{
    public $data;
    public $response;
    public $params;
    public $unique;

    /**
     * EsewaResponse constructor
     *
     * @param object $data
     * @param array $response
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
     * Update Payment Status
     *
     * @return void
     */
    protected function updateStatus()
    {
        if ($this->response['status'] == 'success') {
            $this->setPaymentStatus('completed');
        } else {
            $this->setPaymentStatus('failed');
        }
    }

    /**
     * Set Payment Status
     *
     * @param string $status
     * @return void
     */
    public function setPaymentStatus($status)
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
        return 'esewa';
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
            'amount' => $this->response['amount'],
            'amount_captured' => $this->data->total,
            'currency' => $this->response['currency_code'],
            'code' => $this->data->code
        ];
    }

    /**
     * get hosted url
     */
    public function getUrl()
    {
        return $this->response->hosted_url;
    }

    /**
     * set params
     */
    public function setParams($array)
    {
        $this->params = $array;
    }

    /**
     * get params
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Set a unique code returned by the gateway while creating payment request/transaction
     */
    public function setUniqueCode($code)
    {
        $this->unique = $code;
    }

    /**
     * get a unique code
     *
     * @return string
     */
    public function getUniqueCode()
    {
        return $this->unique;
    }
}
