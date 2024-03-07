<?php

/**
 * @package PaystackBody
 * @author TechVillage <support@techvill.org>
 * @contributor Muhammad AR Zihad <[zihad.techvill@gmail.com]>
 * @created 14-2-22
 */

namespace Modules\Paystack\Entities;

use Modules\Gateway\Entities\GatewayBody;

class PaystackBody extends GatewayBody
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
        $this->publicKey = $request->publicKey;
        $this->instruction = $request->instruction;
        $this->sandbox = $request->sandbox;
        $this->status = $request->status;
    }
}
