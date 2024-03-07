<?php

namespace Modules\Gateway\Response;

abstract class Response
{
    /**
     * Status
     *
     * @var string
     */
    protected $status = 'pending';

    /**
     * Get Status
     *
     * @var string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the name of the gateway
     *
     * @return string
     */
    abstract public function getGateway(): string;

    /**
     * Update protected $status value depending of the payment result
     * pending | successful | failed
     */
    abstract protected function setPaymentStatus($status);
}
