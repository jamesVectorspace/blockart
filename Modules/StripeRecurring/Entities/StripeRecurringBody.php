<?php

/**
 * @package StripeRecurringBody
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 02-04-2023
 */

namespace Modules\StripeRecurring\Entities;

use Modules\Gateway\Entities\GatewayBody;

class StripeRecurringBody extends GatewayBody
{
    /**
     * Stripe client secret
     * 
     * @var string
     */
    public $clientSecret;

    /**
     * Stripe publishable key
     * 
     * @var string
     */
    public $publishableKey;

    /**
     * Stripe instruction
     * 
     * @var string
     */
    public $instruction;

    /**
     * Stripe status
     * 
     * @var string
     */
    public $status;

    /**
     * Stripe mode
     * 
     * @var boolen
     */
    public $sandbox;

    /**
     * Constructor for stripe recurring body
     * 
     * @param array|object $rquest
     * @return void
     */
    public function __construct($request)
    {
        $this->clientSecret = $request->clientSecret;
        $this->publishableKey = $request->publishableKey;
        $this->instruction = $request->instruction;
        $this->status = $request->status;
        $this->sandbox = $request->sandbox;
    }
}
