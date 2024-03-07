<?php

/**
 * @package Coupon Model
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 19-08-2023
 */

namespace Modules\Coupon\Http\Models;

use Carbon\Carbon;
use App\Models\{
    Model
};
use Modules\Subscription\Entities\{
    Credit, Package
};

class Coupon extends Model
{

    /**
     * timestamps
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Relation with CouponRedeem model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function couponRedeems()
    {
        return $this->hasMany('Modules\Coupon\Http\Models\CouponRedeem', 'coupon_id');
    }

    /**
     * Foreign key with package model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plans()
    {
        return $this->belongsToMany(Package::class, 'plan_coupons');
    }
    
    /**
     * Foreign key with package model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function credits()
    {
        return $this->belongsToMany(Credit::class, 'plan_coupons');
    }

    /**
     * Store Coupon
     *
     * @param array $data
     * @return boolean|int $id
     */
    public function store($data = [])
    {
        $id = parent::insertGetId($data);
        if ($id) {
            self::forgetCache();
            return $id;
        }

        return false;
    }

    /**
     * Update Coupon
     *
     * @param array $request
     * @param int $id
     * @return array $data
     */
    public function updateData($request = [], $id = null)
    {
        $data = ['status' => 'fail', 'message' => __('The :x does not exist.', ['x' => __('Coupon')])];
        $result = parent::where('id', $id);
        
        if ($result->exists()) {
            $result->update($request);
            self::forgetCache();
            $data = ['status' => 'success', 'message' => __('The :x has been successfully saved.', ['x' => __('Coupon')])];
        }
        
        return $data;
    }

    /**
     * Delete Coupon
     *
     * @param int $id
     * @return array $data
     */
    public function remove($id = null)
    {
        $data = ['status' => 'fail', 'message' => __('The :x does not exist.', ['x' => __('Coupon')])];
        $record = parent::find($id);
        if (!empty($record)) {
            $record->delete();
            self::forgetCache();
            $data = ['status' => 'success', 'message' => __('The :x has been successfully deleted.', ['x' => __('Coupon')])];
        }
        return $data;
    }
}
