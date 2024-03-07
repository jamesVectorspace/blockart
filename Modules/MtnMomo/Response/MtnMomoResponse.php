<?php

/**
 * @package MtnMomoResponse
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 14-02-23
 */

namespace Modules\MtnMomo\Response;

use Modules\Gateway\Contracts\CryptoResponseInterface;
use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class MtnMomoResponse extends Response implements HasDataResponseInterface, CryptoResponseInterface
{
    protected $response;
    private $data;
    public $unique;
    public $params;


    /**
     * Constructor of the response
     *
     * @param object $data (Order data object)
     * @param object $response (Payment response)
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
     * Update Payment Status
     *
     * @return void
     */
    public function updateStatus()
    {
        if ($this->response->status == 'SUCCESSFUL') {
            $this->setPaymentStatus('completed');
        } else {
            $this->setPaymentStatus('pending');
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
    public function getSimpleResponse()
    {
        return [
            'amount' => $this->data->total,
            'amount_captured' => $this->data->amount,
            'currency' => $this->data->currency,
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
        return 'MtnMomo';
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

    /**
     * Get URL
     *
     * @return string
     */
    public function getUrl()
    {
        return route('gateway.callback', withOldQueryIntegrity(['gateway' => 'mtnmomo']));
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

}
