<?php

namespace Modules\Coinbase\Entities;

use Modules\Gateway\Entities\GatewayBody;

class CoinbaseBody extends GatewayBody
{
    /**
     * API Key
     *
     * @var string
     */
    public $apiKey;

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
     * Coinbase Body Constructor
     *
     * @param Request $request
     * @return void
     */
    public function __construct($request)
    {
        $this->apiKey = $request->apiKey;
        $this->instruction = $request->instruction;
        $this->sandbox = $request->sandbox;
        $this->status = $request->status;
    }
}
