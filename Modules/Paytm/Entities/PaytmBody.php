<?php

/**
 * @package Paytm
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 30-01-2023
 */

namespace Modules\Paytm\Entities;

use Modules\Gateway\Entities\GatewayBody;

class PaytmBody extends GatewayBody
{
    public $merchantId;
    public $merchantKey;
    public $merchantWebsite;
    public $instruction;
    public $status;
    public $sandbox;

    /**
     * Paytm body constructor
     *
     * @param Object|mixed $request
     * @return void
     */
    public function __construct($request)
    {
        $this->merchantId = $request->merchantId;
        $this->merchantKey = $request->merchantKey;
        $this->merchantWebsite = $request->merchantWebsite;
        $this->instruction = $request->instruction;
        $this->status = $request->status;
        $this->sandbox = $request->sandbox;
    }
}
