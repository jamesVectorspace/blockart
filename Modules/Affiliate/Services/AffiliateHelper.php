<?php
/**
 * @package AffiliateHelper
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2023
 */
namespace Modules\Affiliate\Services;

use Illuminate\Support\Facades\Session;
use Modules\Affiliate\Entities\{AffiliateUser, LifeTimeCommission, Referral, ReferralPurchase, ReferralUser};
use Cookie, Cart;
use Modules\Coupon\Http\Models\Coupon;
use Throwable;

class AffiliateHelper
{
    public static $instance;

    protected $key = 'affiliate_commission';

    /**
     * get class instance
     *
     * @return AffiliateHelper
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new AffiliateHelper();
        }
        return self::$instance;
    }

    /**
     * save reference user
     *
     * @return int
     */
    public function saveUser()
    {
        $cookieDuration = preference('cookie_duration');

        if (empty($cookieDuration) || $cookieDuration == 0) {
            return $this->setUserInSession();
        }

        return $this->saveUserInCookie($cookieDuration);
    }

    /**
     * set user in session
     *
     * @return int
     */
    protected function setUserInSession()
    {
        if (!Session::has($this->key)) {
            Session::put($this->key, json_encode(ReferralUser::getReferenceUser()));
        }

        return 0;
    }

    /**
     * save user in cookie
     *
     * @param $day
     * @return int
     */
    protected function saveUserInCookie($day = 1)
    {
        if (is_null(Cookie::get($this->key))) {
            $minutes = 1440 * $day;
            Cookie::queue($this->key, json_encode(ReferralUser::getReferenceUser()), $minutes);
        }

        return 0;
    }

    /**
     * get saved user data
     *
     * @return mixed
     */
    public function getUserData()
    {
        if (preference('lifetime_commission') == 1) {
            $userId = auth()->check() ? auth()->user()->id : null;

            $referralUser = LifeTimeCommission::where('user_id', $userId);

            if ($referralUser->exists()) {
                $referralUser = $referralUser->first();

                if ($referralUser->affiliateUser?->isAllowLifeTimeCustomer()) {
                    return json_encode($referralUser->affiliateUser);
                }
            }
        }


        $cookieDuration = preference('cookie_duration');

        if (empty($cookieDuration) || $cookieDuration == 0) {
            return $this->getUserInSession();
        }

        return $this->getUserInCookie();
    }

    /**
     * get user in seession
     *
     * @return mixed
     */
    protected function getUserInSession()
    {
        return Session::get($this->key);
    }

    /**
     * get user in cookie
     *
     * @return mixed
     */
    protected function getUserInCookie()
    {
        return Cookie::get($this->key);
    }

    /**
     * ref user destroy
     *
     * @return int|null
     */
    public function destroy()
    {
        if (Session::has($this->key)) {
            return Session::forget($this->key);
        }

        return 0;
    }

    public function destroyCookie()
    {
        return Cookie::forget($this->key);
    }

    /**
     * affiliate admin & general user dashboard
     *
     * @param $affiliateUserId
     * @return array
     */
    public function dashoard($affiliateUserId = null): array
    {
        $affiliates = AffiliateUser::select('*');
        $referral = Referral::select('*');
        $referralUser = ReferralUser::select('*');
        $referralPurchase = ReferralPurchase::select('*');

        if (!is_null($affiliateUserId)) {
            $affiliates->where('id', $affiliateUserId);
            $referral->where('affiliate_user_id', $affiliateUserId);
            $referralUser->where('reference_by', $affiliateUserId);
            $referralPurchase->where('affiliate_user_id', $affiliateUserId);
        }

        $data['totalRevenue'] = $affiliates->sum('revenue');
        $data['grossCommission'] = $referralPurchase->sum('commission');
        $data['netCommission'] = $referralPurchase->where('status', 'Approve')->sum('commission');
        $data['totalPaid'] = $affiliates->sum('paid_amount');
        $data['totalAffiliateUser'] = $affiliates->activeUser()->count('id');
        $data['totalCustomer'] = $referralUser->count('user_id');
        $data['totalVisitor'] = $referral->sum('total_click');
        $data['TotalSalesAmount'] = $referral->sum('sales_amount');

        return $data;
     }

    /**
     * get user status based on settings
     *
     * @return string
     */
    public function getUserStatus(): string
    {
        $isAutoApprove = preference('automatic_approve');
        $status = 'Pending';

        if ($isAutoApprove == 1) {
            $status = 'Active';
        } else {
            $roleId = auth()->user()->role()->id;
            $preferenceRoles = preference('affiliate_roles');
            $affiliateRoles = !empty($preferenceRoles) ? json_decode($preferenceRoles, true) : [];
            $status = in_array($roleId, $affiliateRoles) ? 'Active' : $status;
        }

        return $status;
    }

    /**
     * check self referral
     *
     * @param $referrenceUser
     * @return bool
     */
    public function checkSelfRefer($referrenceUser = null)
    {
        if (!is_null($referrenceUser)) {
            $loggedAffiliateUserId = auth()->check() ? auth()->user()->affiliateUser()->first() : null;
            $referrenceUser = json_decode($referrenceUser, true);

            if (!empty($loggedAffiliateUserId) && $loggedAffiliateUserId->id == $referrenceUser['id']) {

                return preference('self_refer') == 1;
            } else {
                return true;
            }
        }

        return false;
    }

    public static function getConfiguredRoles(): array
    {
        try {
            $provider = 'Modules\Affiliate\Services\RolesProvider::class';
            return (new $provider)();
        } catch (Throwable $e) {
            info($e);

            return [];
        }
    }
}
