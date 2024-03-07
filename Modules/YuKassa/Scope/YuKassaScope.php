<?php

/**
 * @package YuKassaScope
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 21-11-23
 */

namespace Modules\YuKassa\Scope;

use Illuminate\Database\Eloquent\{
    Builder,
    Model,
    Scope
};

class YuKassaScope implements Scope
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
        $builder->where('alias', moduleConfig('yukassa.alias'));
    }
}
