<?php

/**
 * @package MtnMomo
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 12-02-23
 */

namespace Modules\MtnMomo\Scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class MtnMomoScope implements Scope
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
        $builder->where('alias', 'mtnmomo');
    }
}
