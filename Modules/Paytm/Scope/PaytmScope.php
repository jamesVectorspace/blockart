<?php

/**
 * @package Paytm
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 30-01-23
 */

namespace Modules\Paytm\Scope;

use Illuminate\Database\Eloquent\{
    Builder,
    Model,
    Scope
};

class PaytmScope implements Scope
{

    /**
     * Scope of the paytm
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('alias', 'paytm');
    }
}
