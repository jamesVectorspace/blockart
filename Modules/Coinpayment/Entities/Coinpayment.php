<?php

namespace Modules\Coinpayment\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\Coinpayment\Scopes\CoinpaymentScope;

class Coinpayment extends Gateway
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
        static::addGlobalScope(new CoinpaymentScope);
    }
}
