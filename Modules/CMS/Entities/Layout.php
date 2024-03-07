<?php

namespace Modules\CMS\Entities;

use App\Models\Model;
use App\Traits\ModelTraits\Cachable;


class Layout extends Model
{
    use Cachable;

    /**
     * Fillable
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Layout type relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function layoutType()
    {
        return $this->belongsTo(\Modules\CMS\Entities\LayoutType::class);
    }

    /**
     * Components relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function components()
    {
        return $this->hasMany(\Modules\CMS\Entities\Component::class);
    }
}
