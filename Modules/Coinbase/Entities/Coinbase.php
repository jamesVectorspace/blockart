<?php

namespace Modules\Coinbase\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\Coinbase\Scope\CoinbaseScope;

class Coinbase extends Gateway
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
        static::addGlobalScope(new CoinbaseScope);
    }
}
