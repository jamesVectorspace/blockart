<?php

namespace Modules\DirectBankTransfer\Scope;

use Illuminate\Database\Eloquent\{
    Builder,
    Model,
    Scope
};

class DirectBankTransferScope implements Scope
{
    /**
     * Apply scope for direct bank transfer.
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('alias', 'directbanktransfer');
    }
}
