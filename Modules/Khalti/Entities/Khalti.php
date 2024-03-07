<?php
/**
 * @package Khalti
 * @author TechVillage <support@techvill.org>
 * @contributor Ahammed Imtiaze <[imtiaze.techvill@gmail.com]>
 * @created 24-08-23
 */

namespace Modules\Khalti\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\Khalti\Scope\KhaltiScope;

class Khalti extends Gateway
{
    protected $table = 'gateways';

    /**
     * Global scope for paytack
     *
     * @return void
     */
    public static function booted()
    {
        static::addGlobalScope(new KhaltiScope);
    }
}