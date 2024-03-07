<?php

namespace Modules\Instamojo\Entities;

use Modules\Gateway\Entities\GatewayBody;

class InstamojoBody extends GatewayBody
{
    /**
     * API Key
     *
     * @var string
     */
    public $apiKey;

    /**
     * Auth Token
     *
     * @var string
     */
    public $authToken;

    /**
     * Instruction
     *
     * @var string
     */
    public $instruction;

    /**
     * Sandbox
     *
     * @var string
     */
    public $sandbox;

    /**
     * Status
     *
     * @var string
     */
    public $status;

    /**
     * Instamojo Body Constructor
     *
     * @param Request $request
     * @return void
     */
    public function __construct($request)
    {
        $this->apiKey = $request->apiKey;
        $this->authToken = $request->authToken;
        $this->instruction = $request->instruction;
        $this->status = $request->status;
        $this->sandbox = $request->sandbox;
    }
}
