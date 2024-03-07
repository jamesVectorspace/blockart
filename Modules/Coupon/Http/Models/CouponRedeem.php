<?php

/**
 * @package CouponRedeem Model
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 28-11-2021
 */

namespace Modules\Coupon\Http\Models;

use App\Models\{
    Model
};
use App\Traits\ModelTrait;
use Modules\Subscription\Entities\Package;

class CouponRedeem extends Model
{
    use ModelTrait;
    /**
     * timestamps
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Foreign key with User model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Foreign key with Coupon model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coupon()
    {
        return $this->belongsTo('Modules\Coupon\Http\Models\Coupon', 'coupon_id');
    }

    /**
     * Foreign key with plan model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    /**
     * Store Coupon Redeem
     *
     * @param array $data
     * @return boolean
     */
    public function store($data = [])
    {
        if (parent::insert($data)) {
            self::forgetCache();
            return true;
        }

        return false;
    }

    /**
     * Update Coupon Redeem
     *
     * @param array $request
     * @param int $id
     * @return array $data
     */
    public function updateData($request = [], $id = null)
    {
        $data = ['status' => 'fail', 'message' => __('No change found.')];
        $result = parent::where('id', $id);
        if ($result->exists()) {
            $result->update($request);
            self::forgetCache();
            $data = ['status' => 'success', 'message' => __('The :x has been successfully saved.', ['x' => __('Coupon Redeem')])];
        }
        return $data;
    }

    /**
     * Delete Coupon Redeem
     *
     * @param int $id
     * @return array $data
     */
    public function remove($id = null)
    {
        $data = ['status' => 'fail', 'message' => __('Coupon Redeem not found.')];
        $record = parent::find($id);
        if (!empty($record)) {
            $record->delete();
            $data = ['status' => 'success', 'message' => __('The :x has been successfully deleted.', ['x' => __('Coupon Redeem')])];
        }
        return $data;
    }
}
