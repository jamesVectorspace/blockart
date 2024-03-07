<?php

namespace Modules\Affiliate\Entities;

use App\Models\User;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Affiliate\Services\AffiliateHelper;
use Illuminate\Support\Facades\Session;
use Modules\Subscription\Entities\SubscriptionDetails;

class ReferralPurchase extends Model
{
    use ModelTrait;
    protected $fillable = ['affiliate_user_id', 'package_subscription_id', 'commission', 'user_id', 'medium', 'status'];

    public function affiliateUser()
    {
        return $this->belongsTo(AffiliateUser::class, 'affiliate_user_id', 'id');
    }

    public function subscriptDetail()
    {
        return $this->belongsTo(SubscriptionDetails::class, 'subscription_detail_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function decrementCommission($value = 0): void
    {
        $this->decrement('commission', $value);
    }

    /**
     * commission generate while subscribe
     * 
     * @param $subscriptionDetails
     * @return int|true
     */
    public static function purchase($subscriptionDetails = null)
    {
        $helper = AffiliateHelper::getInstance();
        $user = $helper->getUserData();
        $selfRefer = $helper->checkSelfRefer($user);
        $data = [];

        if (!is_null($user) && $selfRefer && $user != "null") {
            $user = json_decode($user, true);

            if (isset($user['id'])) {
                $userDetails = AffiliateUser::where('id', $user['id'])->activeUser();

                if (!$userDetails->exists()) {
                    $helper->destroy();
                    $helper->destroyCookie();
                    return 0;
                }
            }

            $commissions = (new CommissionPlan)->getCommission($user, $subscriptionDetails);
            $oneOnly = false;

            foreach ($commissions['commissionData'] as $commission) {

                if (isset($commission['commission']) && $commission['commission'] > 0) {
                    $data[] = [
                        'affiliate_user_id' => $commission['affiliate_user_id'],
                        'package_subscription_id' => $subscriptionDetails->package_subscription_id != 0 ? $subscriptionDetails->package_subscription_id : null,
                        'subscription_detail_id' => $subscriptionDetails->id,
                        'commission' => $commission['commission'],
                        'user_id' => $subscriptionDetails->user_id,
                        'medium' => 'Link',
                        'status' => $subscriptionDetails->payment_status == 'Paid' ? 'Approve' : 'Hold',
                    ];
                    
                    if ($subscriptionDetails->payment_status == 'Paid' && isset($userDetails)) {
                        $affiliateUser = AffiliateUser::where('id', $commission['affiliate_user_id'])->first();
                        
                        if (!empty($affiliateUser)) {
                            $affiliateUser->incrementNetCommission($commission['commission']);
                        }

                        if (!$oneOnly) {
                            $userDetails = $userDetails->first();
                            $oneOnly = true;
                            $userDetails->incrementRevenue($subscriptionDetails->amount_billed);
                            Referral::userProductPurchaseUpdate($commission['affiliate_user_id'], $subscriptionDetails);
                        }
                    }
                }
            }

            if (count($data) > 0) {
                self::store($data);
                CommissionLog::store($commissions['commission_logs'], $subscriptionDetails);

                return true;
            }
        }

        return 0;
    }

    /**
     * store
     *
     * @param $data
     * @return bool
     */
    public static function store($data = [])
    {
        if (parent::insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $response
     * @return bool
     */
    public static function referralPurchaseUpdate($response)
    {
        if ($response->payment_status == 'Paid') {
            $purchaseData = parent::where('subscription_detail_id', $response->id)->get();
            $oneOnly = false;

            foreach ($purchaseData as $data) {
                if ($data->status == 'Hold') {
                    $data->status = 'Approve';
                    $data->save();
                    $data->affiliateUser?->incrementNetCommission($data->commission);

                    if (!$oneOnly) {
                        $oneOnly = true;
                        $data->affiliateUser?->incrementRevenue($response->amount_billed);
                        Referral::userProductPurchaseUpdate($data->affiliate_user_id, $response);
                    }
                }
            }
            
            return true;

        } elseif ($response->payment_status == 'Unpaid') {
            $oneOnly = false;
            $purchaseData = parent::where('subscription_detail_id', $response->id)->get();

            foreach ($purchaseData as $data) {
                if ($data->status == 'Approve') {
                    $data->status = 'Hold';
                    $data->save();
                    
                    $data->affiliateUser?->decrementNetCommission($data->commission);

                    if (!$oneOnly) {
                        $referral = $data->affiliateUser?->referral->where('package_id', $response->package_id)->first();
                        $oneOnly = true;
                        $data->affiliateUser?->decrementRevenue($response->amount_billed);
                        $referral->decrementTotalPurchase(1);
                        $referral->decrementTotalSalesAmout($response->amount_billed);
                    }
                }
            }

            return true;

        }

        return false;
    }
}
