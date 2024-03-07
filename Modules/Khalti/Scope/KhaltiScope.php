<?php
/**
 * @package PaystackScope
 * @author TechVillage <support@techvill.org>
 * @contributor Ahammed Imtiaze <[imtiaze.techvill@gmail.com]>
 * @created 24-08-23
 */

namespace Modules\Khalti\Scope;

use Illuminate\Database\Eloquent\{
    Builder,
    Model,
    Scope
};

class KhaltiScope implements Scope
{
    /**
     * Apply scope.
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('alias', 'khalti');
    }
}

