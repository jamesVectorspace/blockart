<?php

namespace Modules\Affiliate\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class LifeTimeCommission extends Model
{
    protected $fillable = ['user_id', 'referral_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function affiliateUser()
    {
        return $this->belongsTo(AffiliateUser::class, 'referral_id', 'id');
    }

    /**
     * store
     *
     * @param $request
     * @return bool
     */
    public static function store($request)
    {
        if (parent::insert($request)) {
            return true;
        }

        return false;
    }

    /**
     * remove
     *
     * @param $id
     * @return bool
     */
    public static function remove($id)
    {
        $data = parent::where('referral_id', $id);

        if ($data->exists()) {
            $data->delete();

            return true;
        }

        return false;
    }
}
