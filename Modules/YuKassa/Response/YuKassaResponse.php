<?php

/**
 * @package YaKassaResponse
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 21-11-2023
 */

namespace Modules\YuKassa\Response;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class YuKassaResponse extends Response implements HasDataResponseInterface
{
    protected $response;
    private $data;

    /**
     * Initialization
     *
     * @return $this
     */
    public function __construct($data, $yukassaResponse)
    {
        $this->data = $data;
        $this->response = $yukassaResponse;
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
        if ($this->response->status == 'succeeded') {
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
    private function getSimpleResponse()
    {
        return [
            'amount' => $this->response->amount->value,
            'amount_captured' => $this->data->total,
            'currency' => $this->response->amount->_currency,
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
        return moduleConfig('yukassa.name');
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
