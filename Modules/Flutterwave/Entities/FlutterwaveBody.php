<?php

/**
 * @package FlutterwaveBody
 * @author TechVillage <support@techvill.org>
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 * @created 05-01-2022
 */

namespace Modules\Flutterwave\Entities;

use Modules\Gateway\Entities\GatewayBody;

class FlutterwaveBody extends GatewayBody
{
    /**
     * Secret Key
     *
     * @var string
     */
    public $secretKey;

    /**
     * Public Key
     *
     * @var string
     */
    public $publicKey;

    /**
     * Encryption Key
     *
     * @var string
     */
    public $encryptionKey;

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
     * Flutter wave Body Constructor
     *
     * @param Request $request
     * @return void
     */
    public function __construct($request)
    {
        $this->secretKey = $request->secretKey;
        $this->publicKey = $request->publicKey;
        $this->encryptionKey = $request->encryptionKey;
        $this->instruction = $request->instruction;
        $this->status = $request->status;
    }
}
