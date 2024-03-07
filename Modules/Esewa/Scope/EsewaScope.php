<?php

namespace Modules\Esewa\Scope;

use Illuminate\Database\Eloquent\{
    Builder,
    Model,
    Scope
};

class EsewaScope implements Scope
{

    /**
     * Scope Apply
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('alias', 'esewa');
    }
}
