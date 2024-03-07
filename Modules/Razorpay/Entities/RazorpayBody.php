<?php

/**
 * @package RazorpayBody
 * @author TechVillage <support@techvill.org>
 * @contributor Muhammad AR Zihad <[zihad.techvill@gmail.com]>
 * @created 16-2-22
 */

namespace Modules\Razorpay\Entities;

use Modules\Gateway\Entities\GatewayBody;

class RazorpayBody extends GatewayBody
{
    /**
     * API Key
     *
     * @var string
     */
    public $apiKey;

    /**
     * API Secret
     *
     * @var string
     */
    public $apiSecret;

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

    /**
     * Sandbox
     *
     * @var string
     */
    public $sandbox;

    /**
     * Initialization
     *
     * @param array $request
     * @return void
     */
    public function __construct($request)
    {
        $this->apiKey = $request->apiKey;
        $this->apiSecret = $request->apiSecret;
        $this->instruction = $request->instruction;
        $this->status = $request->status;
        $this->sandbox = $request->sandbox;
    }
}
