<?php

/**
 * @package Paytm
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 30-01-2023
 */

namespace Modules\Paytm\Entities;

use Modules\Paytm\Scope\PaytmScope;
use Modules\Gateway\Entities\Gateway;


class Paytm extends Gateway
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
     * Global scope for paytm
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new PaytmScope);
    }
}
