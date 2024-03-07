<?php

/**
 * @package Esewa
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 07-09-23
 */

namespace Modules\Esewa\Entities;

use Modules\Gateway\Entities\GatewayBody;


class EsewaBody extends GatewayBody
{
    public $merchantKey;
    public $instruction;
    public $status;
    public $sandbox;

    /**
     * Constructor
     *
     * @param object $request
     * @return void
     */
    public function __construct($request)
    {
        $this->merchantKey = $request->merchantKey;
        $this->instruction = $request->instruction;
        $this->status = $request->status;
        $this->sandbox = $request->sandbox;
    }
}
