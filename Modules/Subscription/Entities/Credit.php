<?php

/**
 * @package Credit
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 13-08-2023
 */

namespace Modules\Subscription\Entities;

use App\Models\{
    Model, User
};
use Illuminate\Database\Eloquent\Builder;

class Credit extends Model
{
    /**
     * timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fillable
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'code',
        'price',
        'sort_order',
        'plans',
        'features',
        'status', 
        'type'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'features' => 'json',
    ];

    /**
     * Relation with Package model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include active credits.
     */
    public function scopeActiveStatus($query): void
    {
        $query->where('status', 'Active');
    }

    /**
     * Scope a query to only include default credits.
     */
    public function scopeDefault($query)
    {
        $query->where(['type' != 'default']);
    }

    /**
     * Scope a query to sort order credits.
     */
    public function scopeSortOrder($query): void
    {
        $query->orderBy('sort_order', 'Asc');
    }
}
