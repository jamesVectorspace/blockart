<?php

namespace Modules\DirectBankTransfer\Entities;

use Modules\Gateway\Entities\GatewayBody;

class DirectBankTransferBody extends GatewayBody
{
    public $status;
    public $instruction;

    /**
     * Constructor for direct bank transfer body.
     *
     * @param [type] $request
     */
    public function __construct($request)
    {
        $this->instruction = $request->instruction;
        $this->status = $request->status;
    }
}
