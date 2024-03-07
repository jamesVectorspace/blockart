<?php

/**
 * @package YuKassaBody
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mosatafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 21-11-2023
 */

namespace Modules\YuKassa\Entities;

use Modules\Gateway\Entities\GatewayBody;

class YuKassaBody extends GatewayBody
{
    public $storeId;
    public $secretKey;
    public $instruction;
    public $status;
    public $sandbox;

    /**
     * Initialization
     *
     * @param array $request
     * @return void
     */
    public function __construct($request)
    {
        $this->storeId = $request->storeId;
        $this->secretKey = $request->secretKey;
        $this->instruction = $request->instruction;
        $this->status = $request->status;
        $this->sandbox = $request->sandbox;
    }
}
