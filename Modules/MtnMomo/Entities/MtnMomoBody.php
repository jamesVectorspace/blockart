<?php

/**
 * @package MtnMomo
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 12-02-2023
 */

namespace Modules\MtnMomo\Entities;

use Modules\Gateway\Entities\GatewayBody;

class MtnMomoBody extends GatewayBody
{
    /**
     * User API Id
     *
     * @var string
     */
    public $userApiId;

    /**
     * User API Key
     *
     * @var string
     */
    public $userApiKey;

    /**
     * Subscription Key
     *
     * @var string
     */
    public $ocpApimSubscriptionKey;

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
     * SandBox
     *
     * @var string
     */
    public $sandbox;

    /**
     * Country
     *
     * @var object
     */
    public $country;

    /**
     * Mtn Momo Body Constructor
     *
     * @param Request $request
     * @return void
     */
    public function __construct($request)
    {
        $this->userApiId = $request->userApiId;
        $this->userApiKey = $request->userApiKey;
        $this->ocpApimSubscriptionKey = $request->ocpApimSubscriptionKey;
        $this->instruction = $request->instruction;
        $this->status = $request->status;
        $this->sandbox = $request->sandbox;
        $this->country = $request->country;
    }
}
