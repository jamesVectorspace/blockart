<?php

/**
 * @package YuKassa
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 21-11-2023
 */

namespace Modules\YuKassa\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\YuKassa\Scope\YuKassaScope;

class YuKassa extends Gateway
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
        static::addGlobalScope(new YuKassaScope);
    }
}
