<?php

/**
 * @package Esewa
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 07-09-23
 */


namespace Modules\Esewa\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\Esewa\Scope\EsewaScope;

class Esewa extends Gateway
{
    protected $table = 'gateways';

    /**
     * Global scope for Esewa
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new EsewaScope);
    }
}
