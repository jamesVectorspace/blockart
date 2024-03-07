<?php

/**
 * @package Authorize net
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 08-01-2023
 */

namespace Modules\AuthorizeNet\Entities;

use Modules\Gateway\Entities\GatewayBody;

class AuthorizeNetBody extends GatewayBody
{
    /**
     * Merchant Login Id
     *
     * @var string
     */
    public $merchantLoginId;

    /**
     * Merchant Transaction Key
     *
     * @var string
     */
    public $merchantTransactionKey;

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
     * @var bool
     */
    public $sandbox;

    /**
     * AuthorizeNet Body Constructor
     *
     * @param Request $request
     * @return void
     */
    public function __construct($request)
    {
        $this->merchantLoginId = $request->merchantLoginId;
        $this->merchantTransactionKey = $request->merchantTransactionKey;
        $this->instruction = $request->instruction;
        $this->status = $request->status;
        $this->sandbox = $request->sandbox;
    }
}
