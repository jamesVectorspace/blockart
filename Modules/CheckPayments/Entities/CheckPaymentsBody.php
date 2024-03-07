<?php

namespace Modules\CheckPayments\Entities;

use Modules\Gateway\Entities\GatewayBody;

class CheckPaymentsBody extends GatewayBody
{
    public $status;
    public $instruction;

    /**
     * Constructor for check payment body.
     *
     * @param Object $request
     * @return void
     */
    public function __construct($request)
    {
        $this->instruction = $request->instruction;
        $this->status = $request->status;
    }
}
