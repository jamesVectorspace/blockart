<?php

/**
 * @package Paypal Recurring Scope
 * @author TechVillage <support@techvill.org>
 * @contributor Md Mostafijur Rahman<[mostafijur.techvill@gmail.com]>
 * @created 21-05-23
 */

namespace Modules\PaypalRecurring\Scope;

use Illuminate\Database\Eloquent\{
    Scope,
    Builder,
    Model
};

class PaypalRecurringScope implements Scope
{
    /**
     * Scope of the paypal recurring
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('alias', 'paypalrecurring');
    }
}
