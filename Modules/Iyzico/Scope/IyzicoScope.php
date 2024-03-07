<?php

/**
 * @package Iyzico Martvill
 * @author Md. Mostafijur Rahman <mostafijur.techvill@gmail.ocm>
 * @created 05-09-2023
 */

namespace Modules\Iyzico\Scope;

use Illuminate\Database\Eloquent\ {
    Builder, 
    Model, 
    Scope
};

class IyzicoScope implements Scope {

    /**
     * Scope of the iyizco
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model) {
        $builder->where('alias', 'iyzico');
    }
}
