<?php

namespace Modules\Instamojo\Scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class InstamojoScope implements Scope
{

    /**
     * Apply
     *
     * @param Builder $builder
     * @param Model $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('alias', 'instamojo');
    }
}
