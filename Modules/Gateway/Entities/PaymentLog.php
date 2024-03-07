<?php

namespace Modules\Gateway\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentLog extends Model
{
    use HasFactory;

    /**
     * Table
     *
     * @var string
     */
    protected $table = 'payment_logs';

    /**
     * Fillable
     *
     * @var array
     */
    protected $fillable = ['code', 'total', 'sending_details', 'currency_code', 'status'];

    /**
     * Scope Unique Code
     *
     * @param Builder $query
     * @param string $code
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUniqueCode($query, $code)
    {
        return $query->where('unique_code', $code);
    }

    /**
     * Get Sending Details Attribute
     *
     * @return mixed
     */
    public function getSendingDetailsAttribute()
    {
        return json_decode($this->attributes['sending_details']);
    }
}
