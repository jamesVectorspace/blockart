<?php

/**
 * @package Stripe Recurring
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 02-04-2023
 */

namespace Modules\StripeRecurring\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\StripeRecurring\Scope\StripeRecurringScope;

class StripeRecurring extends Gateway
{
    protected $table = 'gateways';
    protected $appends = ['image_url'];

    /**
     * Global scope for stripe recurring
     * 
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new StripeRecurringScope);
    }
}
