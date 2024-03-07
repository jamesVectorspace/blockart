<?php

/**
 * @package Iyzico Martvill
 * @author Md. Mostafijur Rahman <mostafijur.techvill@gmail.ocm>
 * @created 05-09-2023
 */
namespace Modules\Iyzico\Entities;

use Modules\Iyzico\Scope\IyzicoScope;
use Modules\Gateway\Entities\Gateway;

class Iyzico extends Gateway
{
    protected $table = 'gateways';
    protected $appends = ['image_url'];

    /**
     * Global scope for Iyzico
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new IyzicoScope);
    }
}

