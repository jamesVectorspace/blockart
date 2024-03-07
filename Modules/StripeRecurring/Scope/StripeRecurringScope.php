<?php

/**
 * @package StripeRecurringScope
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 02-04-24
 */

namespace Modules\StripeRecurring\Scope;

use Illuminate\Database\Eloquent\{
    Builder,
    Model,
    Scope
};

class StripeRecurringScope implements Scope
{
    /**
     * Scope of the stripe recurring
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('alias', 'striperecurring');
    }
}
