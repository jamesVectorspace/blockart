<?php

namespace Modules\Coinpayment\Response;

use Modules\Gateway\Contracts\CryptoResponseInterface;
use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class CoinpaymentResponse extends Response implements
    HasDataResponseInterface,
    CryptoResponseInterface
{
    /**
     * Response
     *
     * @var object
     */
    private $response;

    /**
     * Data
     *
     * @var object
     */
    private $data;

    /**
     * Params
     *
     * @var array
     */
    private $params;

    /**
     * Unique
     *
     * @var bool
     */
    private $unique;

    /**
     * Coin Payment Response Constructor
     *
     * @param object $response
     * @param object|null $data
     * @return void
     */
    public function __construct($response, $data = null)
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
        return 'coinpayment';
    }

    /**
     * Get Response
     *
     * @return string
     */
    public function getResponse(): string
    {
        return json_encode([
            'amount' => $this->response['result']['amount'],
            'amount_captured' => 0,
            'currency' => $this->response['result']['currency'],
            'code' => $this->data->code
        ]);
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
        return $this->response['result']['checkout_url'];
    }

    /**
     * Set params
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
