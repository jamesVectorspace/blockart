<?php

namespace Modules\CMS\Entities;

use App\Models\Model;
use App\Traits\ModelTraits\Cachable;


class LayoutType extends Model
{
    use Cachable;

    /**
     * Fillable
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Layouts relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function layouts()
    {
        return $this->hasMany(Layout::class);
    }
}
