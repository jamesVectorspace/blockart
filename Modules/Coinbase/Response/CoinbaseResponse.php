<?php

namespace Modules\Coinbase\Response;

use Modules\Gateway\Contracts\CryptoResponseInterface;
use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class CoinbaseResponse extends Response implements
    HasDataResponseInterface,
    CryptoResponseInterface
{

    /**
     * Response
     * @var object
     */
    public $response;

    /**
     * Data
     *
     * @var object|array
     */
    public $data;

    /**
     * Coinbase Response Constructor
     *
     * @param object $response
     * @param object $data
     * @return void
     */
    public function __construct($response, $data)
    {
        $this->response = $response;
        $this->data = $data;
    }

    /**
     * Get Gateway
     *
     * @return string
     */
    public function getGateway(): string
    {
        return 'coinbase';
    }

    /**
     * Get Response
     *
     * @return string
     */
    public function getResponse(): string
    {
        return json_encode([
            'amount' => 0,
            'amount_captured' => 0,
            'currency' => 0,
            'code' => 0
        ]);
    }

    /**
     * Set Payment Status
     *
     * @return void
     */
    public function setPaymentStatus($status)
    {
        $this->status = $status;
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
     * Get URL
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->response->hosted_url;
    }

    /**
     * Set Params
     *
     * @param array $array
     * @return void
     */
    public function setParams($array)
    {
        $this->params = $array;
    }

    /**
     * Get Params
     *
     * @return array
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
