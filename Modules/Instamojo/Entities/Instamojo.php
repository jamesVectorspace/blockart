<?php

namespace Modules\Instamojo\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\Instamojo\Scope\InstamojoScope;

class Instamojo extends Gateway
{

    /**
     * Table
     *
     * @var string
     */
    protected $table = 'gateways';

    /**
     * Booted
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new InstamojoScope);
    }
}
