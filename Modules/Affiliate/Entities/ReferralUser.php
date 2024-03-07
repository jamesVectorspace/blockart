<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReferralUser extends Model
{

    public $timestamps = false;

    protected $fillable = ['reference_by', 'affiliate_user_id', 'user_id'];

    public function affiliateUser()
    {
        return $this->belongsTo(AffiliateUser::class, 'affiliate_user_id', 'id');
    }

    public function affiliateUserReference()
    {
        return $this->belongsTo(AffiliateUser::class, 'reference_by', 'id');
    }

    public function parent()
    {
        return $this->hasOne('Modules\Affiliate\Entities\ReferralUser', 'affiliate_user_id', 'reference_by');
    }

    /**
     * referral user store
     *
     * @param $ref
     * @param $userId
     * @return false
     */
    public static function referralUserStore($ref, $userId)
    {
        $affiliateUser = self::getReferenceUser($ref);

        if (!empty($affiliateUser)) {

            return parent::create([
                'user_id' => $userId,
                'reference_by' => $affiliateUser->id,
            ]);
        }

        return false;
    }

    /**
     * get reference affiliate user
     *
     * @param $ref
     * @return mixed
     */
    public static function getReferenceUser($ref = null)
    {
        if ($ref == null) {
            $key = Referral::getReferenceKey();
            $ref = request()->$key ?? null;
        }

        $totalLength = strlen($ref);
        $numberOnly = preg_replace( '/[^0-9]/', '', $ref);

        if ($totalLength == strlen($numberOnly)) {
            $affiliateUser = AffiliateUser::where('id', $numberOnly)->first();
        } else {
            $affiliateUser = AffiliateUser::where('identifier', $ref)->first();
        }

        return $affiliateUser;
    }
}
