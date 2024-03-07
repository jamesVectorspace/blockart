<?php

namespace Modules\CMS\Entities;

use App\Models\Model;
use App\Traits\ModelTraits\Cachable;
use App\Traits\ModelTraits\hasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use function PHPUnit\Framework\isJson;

class ComponentProperty extends Model
{
    use HasFactory, Cachable, hasFiles;

    /**
     * Timestamp
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Fillable
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * New Factory
     *
     * @return object
     */
    protected static function newFactory()
    {
        return \Modules\CMS\Database\factories\ComponentPropertyFactory::new();
    }

    /**
     * Relation with Component model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    /**
     * Get Value Attribute
     *
     * return string|object
     */
    public function getValueAttribute()
    {
        $value = $this->attributes['value'];
        if ($this->attributes['type'] == 'array') {
            return json_decode($value, 1);
        }
        return $value;
    }

    /**
     * Get Object Type
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->objectType();
    }

    /**
     * Get Object Id
     *
     * @return int|string
     */
    public function getObjectId()
    {
        return $this->objectId();
    }
}
