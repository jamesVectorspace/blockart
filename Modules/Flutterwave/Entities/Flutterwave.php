<?php

/**
 * @package Flutterwave
 * @author TechVillage <support@techvill.org>
 * @contributor kabir Ahmed <[kabir.techvill@gmail.com]>
 * @created 05-11-2022
 */

namespace Modules\Flutterwave\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\Flutterwave\Scope\FlutterwaveScope;

class Flutterwave extends Gateway
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
        static::addGlobalScope(new FlutterwaveScope);
    }
}
