<?php

/**
 * @package CouponService
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 19-08-2023
 */

 namespace Modules\Coupon\Services;

use App\Models\User;
use Carbon\Carbon;
use Modules\Subscription\Entities\Package;
use Modules\Coupon\Http\Models\{
    Coupon, CouponRedeem
};
use Modules\Subscription\Entities\Credit;
use Modules\Subscription\Entities\SubscriptionDetails;

class CouponService
{
    /**
     * service name
     * @var string
     */
    public string|null $service;
    
    /**
     * Cache time in second
     * 
     * @var int
     */
    public int $cacheTime = 60 * 60;
     
    /**
     * Coupon
     * @var object
     */
    public object|null $coupon;
    
    /**
     * Plan
     * @var object
     */
    public object|null $plan = null;
    
    /**
     * User
     * @var object
     */
    public object|null $user = null;
    
    /**
     * Billing Cycle
     * @var string
     */
    public string $billingCycle;
    
    /**
     * Error Message
     * 
     * @var string
     */
    public string|null $errorMessage = null;
    
    /**
     * Success Message
     * 
     * @var string
     */
    public string|null $successMessage = null;
    
    /**
     * Discount Amount
     * 
     * @var array
     */
    public $discountAmount = [];
     
    /**
     * Initialize
     *
     * @param string $service
     * @return void
     */
    public function __construct($service = null)
    {
        $this->service = $service;

        if (is_null($service)) {
            $this->service = __('Coupon');
        }
    }
    
    /**
     * Set Coupon
     * 
     * @param string $code
     * @return object
     */
    public function setCoupon($code)
    {
        if ($code) {
            $this->coupon = Coupon::where('code', $code)->first();
        }
        
        return $this;
    }
    
    /**
     * Set Plan
     * 
     * @param int $planId
     * @return object
     */
    public function setPlan($planId)
    {
        if (!$planId) {
            return $this;
        }
        
        if ($this->billingCycle == 'onetime') {
            $this->plan = Credit::find($planId);
        } else {
            $this->plan = Package::find($planId);
        }
        
        return $this;
    }
    
    /**
     * Set Billing Cycle
     * 
     * @param string $billingCycle
     * @return object
     */
    public function setBillingCycle($billingCycle)
    {
        if ($billingCycle) {
            $this->billingCycle = $billingCycle;
        }
        
        return $this;
    }
    
    /**
     * Get User
     * 
     * @param int|null $userId
     * @return object
     */
    public function setUser($userId = null)
    {
        if ($userId) {
            $this->user = User::find($userId);
        }
        
        return $this;
    }
    
    /**
     * Set All
     * 
     * @param string $code
     * @param int $planId
     * @param int $userId
     * @return object
     */
    public function setAll($code, $planId, $userId, $billingCycle)
    {
        $this->setCoupon($code);
        $this->setBillingCycle($billingCycle);
        $this->setPlan($planId);
        $this->setUser($userId);
        
        return $this;
    }
    
    /**
     * Is valid billing cycle
     * 
     * @return boolean
     */
    private function isValidBillingCycle()
    {
        $cycles = [
            'onetime', 'days', 'weekly', 'monthly', 'yearly', 'lifetime'
        ];
        
        if (empty($this->billingCycle) || !in_array($this->billingCycle, $cycles)) {
            $this->errorMessage = __('Invalid billing cycle provided.');
            return false;
        }
        
        return true;
    }
    
    /**
     * Is coupon used
     */
    private function couponIsUsed($code)
    {
        $cacheKey = config('cache.prefix') . '.' . $this->plan?->id . '_' . $this->user?->id;
        
        $data = \Cache::get($cacheKey);
        return isset($data[$code]);
    }

    /**
     * Check Coupon Validity
     *
     * @param string $code
     * @param int $userId
     * @return object $this
     */
    public function checkCouponValidity($code = null, $userId = null)
    {
        $this->setCoupon($code);
        $this->setUser($userId);
        $this->isValidBillingCycle();
        
        if ($this->errorMessage) {
            return $this;
        }
        
        $userUsageCount = CouponRedeem::where(['user_id' => $this->user?->id, 'coupon_code' => $this->coupon?->code, 'status' => 'Active'])->count();
        
        $message = match (true) {
            empty($this->coupon) => __('Invalid coupon code.'),
            $this->coupon->status == 'Inactive' => __('This coupon is not valid.'),
            $this->isExpired($this->coupon?->code) => __('This coupon has been expired.'),
            now() < $this->coupon['start_date'] => __('This coupon is not activated yet.'),
            $this->coupon->usage_limit_per_coupon && $this->coupon->usage_limit_per_coupon <= $this->coupon->usage_count => __('Coupon limit exceeded.'),
            $userUsageCount && $this->coupon->usage_limit_per_user && $userUsageCount >= $this->coupon->usage_limit_per_user => __('Your limit exceeded.'),
            default => 'valid'
        };
                
        if ($this->couponIsUsed($this->coupon?->code)) {
            $message = __('The coupon code is already used.');
        }
        
        if ($message == 'valid') {
            $this->successMessage = __('This coupon is valid.');
        } else {
            $this->errorMessage = $message;
        }

        return $this;
    }
    
    /**
     * Check Plan Validity
     *
     * @param string|null $code
     * @param int|null $planId
     * @param int|null $userId
     * @param string|null $billingCycle
     * @return object $this
     */
    public function checkPlanValidity($planId = null, $userId = null, $code = null, $billingCycle = null)
    {
        $this->setAll($code, $planId, $userId, $billingCycle);
        
        if ($this->errorMessage) {
            return $this;
        }
        
        $plans = $this->coupon->plans()->pluck('package_id')->toArray();
        
        if (!$this->plan) {
            $this->errorMessage = __('The plan does not exist.');
            return $this;
        }
        
        if ($this->billingCycle == 'onetime') {
            $planPrice = $this->plan->price;
        } else {
            $planPrice = $this->plan->discount_price[$this->billingCycle] ? $this->plan->discount_price[$this->billingCycle] : $this->plan->sale_price[$this->billingCycle];
        }
        
        $isIndividualCouponApply = Coupon::whereIn('code', array_keys($this->getDiscount($this->plan?->id, $this->user->id)))->where('individual_use', 1)->count();
        
        if (!empty($plans) && !in_array($this->plan?->id, $plans) && $this->billingCycle != 'onetime') {
            $this->errorMessage = __('This coupon is not applicable to this plan.');
        } else if ($planPrice < $this->coupon->minimum_spend) {
            $this->errorMessage = __('A minimum spending of :x is required to get the coupon discount.', ['x' => formatNumber($this->coupon->minimum_spend)]);
        } else if ($this->coupon->individual_use && !empty($this->getDiscount($this->plan?->id, $this->user->id))) {
            $this->errorMessage = __('The coupon is for individual use only.');
        } else if ($isIndividualCouponApply) {
            $this->errorMessage = __('Individual coupon already applied.');
        } else {
            $this->successMessage = __('This plan is valid.');
        }

        return $this;
    }

    /**
     * Check Coupon Expire
     *
     * @param string $code
     * @return boolean
     */
    public function isExpired($code = null) 
    {
        $this->setCoupon($code);
        
        if ($this->coupon->status == 'Expired') {
            return true;
        }

        if ($this->coupon && now() > $this->coupon['end_date'] && $this->coupon['status'] == 'Active') {
            Coupon::where('code', $code)->update(['status' => 'Expired']);
            Coupon::forgetCache();

            return true;
        }
        
        return false;
    }

    /**
     * Check Coupon Started
     *
     * @param string $code
     * @return boolean
     */
    public function isStarted($code = null) 
    {
        $this->setCoupon($code);
        
        return $this->coupon && now() < $this->coupon['start_date'];
    }

    /**
     * Check Coupon Discount
     *
     * @param string $code
     * @return array $response
     */
    public function checkCouponDiscount($code = null) {
        $this->setCoupon($code);
        
        if ($this->errorMessage) {
            return $this;
        }
        
        if ($this->coupon->discount_type == 'Flat') {
            $this->successMessage = __('You will get :x discount to use the coupon.', ['x' => formatNumber($this->coupon->discount_amount)]);
            
            return $this;
        }
        
        if ($this->coupon->maximum_discount_amount <= 0) {
            $this->successMessage = __('You will get :x discount to use the coupon.', ['x' => formatCurrencyAmount($this->coupon->discount_amount) . '%']);
        } else {
            $this->successMessage = __('You will get :x discount to use the coupon. Up to :y.', ['x' => formatCurrencyAmount($this->coupon->discount_amount) . '%', 'y' => formatNumber($this->coupon->maximum_discount_amount)]);
        }
        
        return $this;
    }
    
    /**
     * Calculate Discount
     * 
     * @param int|null $planId
     * @return array
     */
    private function calculateDiscount($planId = null)
    {
        $this->setPlan($planId);
        
        if ($this->billingCycle == 'onetime') {
            $planPrice = $this->plan->price;
        } else {
            $planPrice = $this->plan->discount_price[$this->billingCycle] ? $this->plan->discount_price[$this->billingCycle] : $this->plan->sale_price[$this->billingCycle];
        }
        
        $discountMethod = strtolower($this->coupon->discount_type) . 'Discount';
        
        if (method_exists($this, $discountMethod)) {
            $this->{$discountMethod}($planPrice);
        }
        
        return $this->discountAmount;
    }
    
    /**
     * Flat Discount
     * 
     * @param float $planPrice
     * @return void
     */
    private function flatDiscount($planPrice)
    {
        if ($planPrice <= $this->coupon->discount_amount) {
            $this->discountAmount[$this->coupon->code] = $planPrice;
        }
        
        $this->discountAmount[$this->coupon->code] = $this->coupon->discount_amount;
    }
    
    /**
     * Percentage Discount
     * 
     * @param float $planPrice
     * @return void
     */
    private function percentageDiscount($planPrice)
    {
        $discount = $this->coupon->discount_amount * $planPrice / 100;
        
        if ($this->coupon->maximum_discount_amount > 0 && $discount > $this->coupon->maximum_discount_amount) {
            $this->discountAmount[$this->coupon->code] = $this->coupon->maximum_discount_amount;
        } else {
            $this->discountAmount[$this->coupon->code] = $discount;
        }
    }
    
    /**
     * Set Discount
     * 
     * @param int|null $planId
     * @param int|null $userId
     * @param string|null $code
     * @param string|null $billingCycle
     * @return object
     */
    public function setDiscount($planId = null, $userId = null, $code = null, $billingCycle = null)
    {
        $this->setAll($code, $planId, $userId, $billingCycle);
        $this->calculateDiscount($this->plan->id);
        
        $cacheKey = config('cache.prefix') . '.' . $this->plan->id . '_' . $this->user->id;
        if ($this->billingCycle == 'onetime') {
            $planPrice = $this->plan->price;
        } else {
            $planPrice = $this->plan->discount_price[$this->billingCycle] ? $this->plan->discount_price[$this->billingCycle] : $this->plan->sale_price[$this->billingCycle];
        }
        
        if ($planPrice < array_sum($this->getDiscount($this->plan->id, $this->user->id)) + $this->discountAmount[$this->coupon->code]) {
            $this->discountAmount[$this->coupon->code] = $planPrice - array_sum($this->getDiscount($this->plan->id, $this->user->id));
        }
        
        $discount = array_merge($this->getDiscount($this->plan->id, $this->user->id), $this->discountAmount);
        
        \Cache::put($cacheKey, $discount, $this->cacheTime);
        
        $this->successMessage = __('Discount set successfully.');
        
        return $this;
    }
    
    /**
     * Get Discount
     * 
     * @param int|null $planId
     * @param int|null $userId
     * @return array
     */
    public function getDiscount($planId = null, $userId = null, $billingCycle = null)
    {
        $this->setAll(null, $planId, $userId, $billingCycle);
        
        $cacheKey = config('cache.prefix') . '.' . $this->plan?->id . '_' . $this->user?->id;
        
        return \Cache::get($cacheKey) ?? [];
    }
    
    /**
     * Get Discount Amount
     * 
     * @param int|null $planId
     * @param int|null $userId
     * @return float
     */
    public function getDiscountAmount($planId = null, $userId = null, $billingCycle = null)
    {
        $this->setAll(null, $planId, $userId, $billingCycle);    
        
        if (!$this->plan || !$this->isValidBillingCycle()) {
            return 0;
        }
        
        if ($this->billingCycle == 'onetime') {
            $planPrice = $this->plan->price;
        } else {
            $planPrice = $this->plan->discount_price[$this->billingCycle] ? $this->plan->discount_price[$this->billingCycle] : $this->plan->sale_price[$this->billingCycle];
        }
        
        $userDiscount = array_sum($this->getDiscount($this->plan->id, $this->user->id));
        
        return $userDiscount > $planPrice ? $planPrice : $userDiscount;
    }
    
    /**
     * Forget cache
     * 
     * @param int $planId
     * @param int $userId
     * @return object
     */
    public function forgetCache($planId, $userId, $code = null)
    {
        $cacheKey = config('cache.prefix') . '.' . $planId . '_' . $userId;
        
        if (empty($code)) {
            \Cache::forget($cacheKey);
        } else {
            $data = \Cache::get($cacheKey);
            unset($data[$code]);
            \Cache::put($cacheKey, $data, $this->cacheTime);
        }
        
        $this->successMessage = __('Coupon discount reset successfully.');
        
        return $this;
    }
    
    /**
     * Get Response
     * 
     * @return array
     */
    public function getResponse()
    {
        if ($this->errorMessage) {
            return [
                'status' => 'fail',
                'message' => $this->errorMessage
            ];
        }
        
        return [
            'status' => 'success',
            'message' => $this->successMessage
        ];
    }
    
    /**
     * Store Coupon Redeem
     * 
     * @param int $detailId
     * @param int $packageId
     * @return bool
     */
    public function storeCouponRedeem($detailId, $packageId, $status = 'Inactive', $planType = 'main')
    {
        $subscriptionDetail = SubscriptionDetails::find($detailId);
        if (empty($subscriptionDetail)) {
            return false;
        }
        $user = User::find($subscriptionDetail->user_id);
        if (empty($user)) {
            return false;
        }
        $coupon = $this->getDiscount($packageId, $user->id, $subscriptionDetail->billing_cycle ?? 'onetime');
        try {
            foreach ($coupon as $code => $amount) {
                CouponRedeem::insert([
                    'coupon_id' => Coupon::firstWhere('code', $code)->id,
                    'coupon_code' => $code,
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'subscription_detail_id' => $detailId,
                    'package_id' => $packageId,
                    'package_type' => $planType,
                    'discount_amount' => $amount,
                    'status' => $status
                ]);
            }
            $status = true;
        } catch (\Exception $e) {
            $status = false;
        }
        
        return $status;
    }
    
    /**
     * Store Coupon Redeem
     * 
     * @param int $detailId
     * @param string $status
     * @return bool
     */
    public static function updateCouponRedeemStatus($detailId, $status = 'Active')
    {
        return CouponRedeem::where('subscription_detail_id', $detailId)->update(['status' => $status]);
    }

    /**
     * Get Coupon
     *
     * @param int $weeklyCoupon, $exclusiveCoupon
     * @return collection $result
     */
    public static function getCoupons($weeklyCoupon = false, $exclusiveCoupon = false)
    {
        $result['allCoupons'] = Coupon::where('status', 'Active')->where('end_date', '>=', date('Y/m/d'))->get();
        if ($weeklyCoupon) {
            $result['weeklyCoupons'] = $result['allCoupons']->whereBetween('end_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->take(6);
        }

        if ($exclusiveCoupon) {
            $result['exclusiveCoupons'] = $result['allCoupons']->where('discount_type', 'Percentage')->sortByDesc('discount_amount')->take(3);
        }

        return $result;
    }
}
