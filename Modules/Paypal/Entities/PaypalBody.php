<?php

/**
 * @package Paypal
 * @author TechVillage <support@techvill.org>
 * @contributor Muhammad AR Zihad <[zihad.techvill@gmail.com]>
 * @created 15-2-22
 */

namespace Modules\Paypal\Entities;

use Modules\Gateway\Entities\GatewayBody;

class PaypalBody extends GatewayBody
{
    /**
     * Secret Key
     *
     * @var string
     */
    public $secretKey;

    /**
     * Client Id
     *
     * @var string
     */
    public $clientId;

    /**
     * Instruction
     *
     * @var string
     */
    public $instruction;

    /**
     * Status
     *
     * @var string
     */
    public $status;

    /**j
     * Sandbox
     *
     * @var string
     */
    public $sandbox;

    /**
     * Initialize
     *
     * @param Request $request
     * @return void
     */
    public function __construct($request)
    {
        $this->secretKey = $request->secretKey;
        $this->clientId = $request->clientId;
        $this->instruction = $request->instruction;
        $this->sandbox = $request->sandbox;
        $this->status = $request->status;
    }
}
