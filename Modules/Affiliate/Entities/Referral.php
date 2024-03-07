<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Modules\Affiliate\Services\AffiliateHelper;
use Modules\Subscription\Entities\Credit;
use Modules\Subscription\Entities\Package;

class Referral extends Model
{
    protected $fillable = ['affiliate_user_id', 'package_id', 'credit_id', 'total_click', 'total_purchase', 'sales_amount'];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function credit()
    {
        return $this->belongsTo(Credit::class, 'credit_id', 'id');
    }

    public function incrementTotalClick($count = 1)
    {
        $this->increment('total_click', $count);
    }

    public function incrementTotalPurchase($count = 1)
    {
        $this->increment('total_purchase', $count);
    }

    public function incrementTotalSalesAmout($value = 0)
    {
        $this->increment('sales_amount', $value);
    }

    public function decrementTotalPurchase($count = 1)
    {
        $this->decrement('total_purchase', $count);
    }

    public function decrementTotalSalesAmout($value = 0)
    {
        $this->decrement('sales_amount', $value);
    }

    /**
     * get reference key
     *
     * @return mixed|string
     */
    public static function getReferenceKey()
    {
        $perameter = preference('track_param');
        $paremName = !empty($perameter) ? preference('track_param') : "ref";

        return $paremName;
    }

    /**
     * user click update
     *
     * @return bool|int|void
     */
    public static function userClickUpdate($productId = null)
    {
        $perameter = self::getReferenceKey();

        if (isset(request()->$perameter)) {
            session()->put('aff_reference', request()->$perameter);
            $user = ReferralUser::getReferenceUser(request()->$perameter);
            $helper = AffiliateHelper::getInstance();
            $helper->saveUser();

            if (!empty($user)) {
                $product = [];

                if (!is_null($productId)) {
                    $product = ['product_id' => $productId];
                    $referral = $user->referrals?->where('product_id', $productId)->first();
                } else {
                    $referral = $user->referrals?->whereNull('product_id')->first();
                }

                if (!empty($referral)) {

                    $userKey = 'user_home_' . $referral->id;

                    if (!Session::has($userKey)) {
                        Session::put($userKey, 1);
                        return $referral->incrementTotalClick();
                    }

                    return 0;
                }

                return self::store(array_merge(['affiliate_user_id' => $user->id, 'total_click' => 1, 'total_purchase' => 0], $product));
            }
        }
    }

    /**
     * update purchase
     * 
     * @param $affiliateUserId
     * @param $subscriptionDetails
     * @return true
     */
    public static function userProductPurchaseUpdate($affiliateUserId, $subscriptionDetails)
    {
        if ($subscriptionDetails->package_subscription_id == 0) {
            $user = Referral::where('affiliate_user_id', $affiliateUserId)->where('credit_id', $subscriptionDetails->package_id)->first();
        } else {
            $user = Referral::where('affiliate_user_id', $affiliateUserId)->where('package_id', $subscriptionDetails->package_id)->first();
        }

        if (!empty($user)) {
            $user->incrementTotalPurchase(1);
            $user->incrementTotalSalesAmout($subscriptionDetails->amount_billed);
        } else {
            if ($subscriptionDetails->package_subscription_id == 0) {
                self::store(['affiliate_user_id' => $affiliateUserId, 'credit_id' => $subscriptionDetails->package_id, 'total_click' => 0, 'total_purchase' => 1, 'sales_amount' => $subscriptionDetails->amount_billed]); 
            } else {
                self::store(['affiliate_user_id' => $affiliateUserId, 'package_id' => $subscriptionDetails->package_id, 'total_click' => 0, 'total_purchase' => 1, 'sales_amount' => $subscriptionDetails->amount_billed]);
            }
        }

        return true;
    }

    /**
     * store
     *
     * @param $data
     * @return bool
     */
    public static function store($data = [])
    {
        if (parent::create($data)) {
            return true;
        }

        return false;
    }
}
