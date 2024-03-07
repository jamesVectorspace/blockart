<?php

/**
 * @package KhaltiBody
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 04-09-23
 */

namespace Modules\Khalti\Entities;

use Modules\Gateway\Entities\GatewayBody;

class KhaltiBody extends GatewayBody
{
    public $secretKey;
    public $publicKey;
    public $instruction;
    public $status;
    public $sandbox;

    /**
     * Constructor for pay stack body
     *
     * @param Array|Collection $request
     * @return void
     */
    public function __construct($request)
    {
        $this->secretKey = $request->secretKey;
        $this->instruction = $request->instruction;
        $this->sandbox = $request->sandbox;
        $this->status = $request->status;
    }
}
