<?php

/**
 * @package Paypal recurring
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 21-05-23
 */

namespace Modules\PaypalRecurring\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\PaypalRecurring\Scope\PaypalRecurringScope;

class PaypalRecurring extends Gateway
{
    /**
     * Gateway table name
     *
     * @var string
     */
    protected $table = 'gateways';

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * Scope for paypal recurring
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new PaypalRecurringScope);
    }
}
