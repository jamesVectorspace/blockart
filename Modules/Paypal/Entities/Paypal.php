<?php

/**
 * @package Paypal
 * @author TechVillage <support@techvill.org>
 * @contributor Muhammad AR Zihad <[zihad.techvill@gmail.com]>
 * @created 15-2-22
 */

namespace Modules\Paypal\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\Paypal\Scope\PaypalScope;

class Paypal extends Gateway
{

    /**
     * Table
     *
     * @var string
     */
    protected $table = 'gateways';

    /**
     * Appends
     *
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * Booted
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new PaypalScope);
    }
}
