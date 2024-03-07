<?php

namespace Modules\Affiliate\Entities;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use DB;

class CommissionPlan extends Model
{
    use ModelTrait;
    protected $fillable = ['name', 'commission', 'level', 'level_commission', 'commission_type', 'match_type', 'rule_groups', 'apply_to', 'remaining' ,'status'];

    protected $affiliateUser;
    protected $rootMatchType;
    protected $isAllGroupPass = false;
    protected $isAllRulePass = false;
    protected $condition;
    protected $matchType;
    protected $ruleApplicable = false;
    protected $ruleValues = [];
    protected $commissionAmount = 0;
    protected $levelNumber = 0;
    protected $commissionLevel;
    protected $packageSubscriptionDetails;
    protected $totalCommission = [];
    protected $commissionArray = [];
    protected $packagePrice = 0;
    protected $applyTo = 'all';
    protected $commissionRemaining = 'continue';
    protected $matchingId = [];
    protected $commissionId;
    protected $defaultCommission;
    protected $commissionType;
    protected $findReferralUser;
    protected $commissionLogs;
    protected $packageId;

    /**
     * commssion level attribute
     *
     * @return Attribute
     */
    protected function levelCommission(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    /**
     * rule attribute
     *
     * @return Attribute
     */
    protected function ruleGroups(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode(self::formatedRuleGroups($value)),
        );
    }

    /**
     * formatted rules
     *
     * @param $ruleGroups
     * @return array
     */
    protected static function formatedRuleGroups($ruleGroups)
    {
        $data = [];
        $index = 0;

        foreach ($ruleGroups as $key => $groups) {

            if (is_numeric($key)) {
                foreach ($groups as $key2 => $group) {
                    if ($key2 == 'match_type') {
                        $data[$index]['match_type'] = $group;
                    } else {
                        $data[$index]['rules'][] = [
                            'name' =>  $group['name'],
                            'condition' => $group['condition'],
                            'value' => $ruleGroups[$key2]['value']
                        ];
                    }
                }
            }
            $index++;
        }

        return $data;
    }

    /**
     * plan store
     *
     * @param $request
     * @return bool
     */
    public static function store($request)
    {
        if (parent::create($request)) {
            self::forgetCache();
            return true;
        }

        return false;
    }

    /**
     * update plan
     *
     * @param $data
     * @param $id
     * @return bool
     */
    public static function updateCommissionPlan($data, $id)
    {
        $result = parent::where('id', $id);

        if ($result->exists()) {
            if (isset($data['rule_groups'])) {
                $data['rule_groups'] = self::formatedRuleGroups($data['rule_groups']);
            }
            $result->update($data);
            self::forgetCache();
            return true;
        }

        return false;
    }

    /**
     * plan remove
     *
     * @param $id
     * @return array
     */
    public static function remove($id = null)
    {
        $data = ['type' => 'fail', 'message' => __('Something went wrong, please try again.')];
        $commissionInfo = parent::find($id);

        if (!empty($commissionInfo) && !$commissionInfo->isDefault()) {
            $commissionInfo->delete();
            self::forgetCache();
            $data = ['type' => 'success', 'message' => __('The :x has been successfully deleted.', ['x' => __('Commission Plan')])];
        }

        return $data;
    }

    /**
     * rule values
     *
     * @param $name
     * @param $values
     * @return mixed
     */
    public function getRuleValuesName($name, $values = [])
    {
        switch ($name) {
            case 'affiliate_tag':
                $table = 'affiliate_tags';
                break;
            case 'package':
                $table = 'packages';
                break;
            case 'product_category':
                $table = 'categories';
                break;
            case 'credit':
                $table = 'credits';
                break;

            default:
                $table = '';
                break;
        }
        
        if (empty($table) && $name != 'affiliate_user') {
            return [];
        }
        

        if ($name == 'affiliate_user') {
            return AffiliateUser::whereIn('id', $values)->with('user')->get();
        }
        
        return DB::table($table)->whereIn('id', $values)->get();
    }

    /**
     * check default
     *
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->is_default == 1;
    }

    /**
     * get commission
     * 
     * @param $user
     * @param $packageSubscriptionDetails
     * @return array|mixed
     */
    public function getCommission($user = [], $packageSubscriptionDetails = null)
    {
        $this->affiliateUser = $user;
        $this->findReferralUser = ReferralUser::where('affiliate_user_id', $this->affiliateUser['id'])->first();
        $commissions = CommissionPlan::getAll()->where('is_default', '!=', 1)->where('status', 'Active');
        $this->defaultCommission = CommissionPlan::getAll()->where('is_default', 1)->where('status', 'Active')->first();
        $this->packageSubscriptionDetails = $packageSubscriptionDetails;
        $excludePackages = preference('exclude_packages');
        $excludePackages = !empty($excludePackages) ? json_decode($excludePackages) : [];
        
        if (!in_array($packageSubscriptionDetails->package_id, $excludePackages)) {
            $this->isAllGroupPass = false;

            if (count($this->matchingId) > 0 && $this->applyTo == 'first') {
                $matchingId = $this->matchingId;

                $commissions = $commissions->filter(function ($value, $key2) use ($matchingId) {
                    return !in_array($value->id, $matchingId);
                });
            }

            if ($this->commissionRemaining == 'continue') {
                $this->calculateCommission($commissions, $packageSubscriptionDetails->package_id);
            } elseif ($this->commissionRemaining == 'default') {
                $this->getCommissionFromDefault(false, false);
            } else {
                $this->getCommissionFromDefault(true);
            }

            $this->packagePrice = $packageSubscriptionDetails->amount_billed;
            $this->packageId = $packageSubscriptionDetails->package_id ;
            $this->commissionDistribute($this->commissionRemaining == 'default');
        }

        return $this->totalCommissionAmount();
    }

    /**
     * calculate commission
     * 
     * @param $commissions
     * @param $packageId
     * @return void
     */
    protected function calculateCommission($commissions, $packageId)
    {
        foreach ($commissions as $commission) {
            $this->commissionAmount = $commission->commission;
            $this->levelNumber = $commission->level;
            $this->commissionLevel = $commission->level_commission;
            $this->rootMatchType = $commission->match_type;
            $this->applyTo = $commission->apply_to;
            $this->commissionRemaining = $commission->remaining;
            $this->commissionId = $commission->id;
            $this->commissionType = $commission->commission_type;

            foreach ($commission->rule_groups as $group) {
                $this->matchType = $group['match_type'];

                foreach ($group['rules'] as $rule) {
                    $this->condition = $rule['condition'];
                    $this->ruleValues = $rule['value'];

                    if ($rule['name'] == 'affiliate_user') {
                        $this->ruleApplicable = $this->checkAffiliateUser();
                    } elseif ($rule['name'] == 'affiliate_tag') {
                        $this->ruleApplicable = $this->checkAffiliateTag();
                    } elseif ($rule['name'] == 'package') {
                        $this->ruleApplicable = $this->checkPackage($packageId);
                    } elseif ($rule['name'] == 'credit') {
                        $this->ruleApplicable = $this->checkCredit($packageId);
                    }

                    if ($this->matchType == 'OR' && $this->ruleApplicable) {
                        $this->isAllRulePass = true;
                        $this->updateGroupPass();
                        break;
                    } elseif ($this->matchType == 'AND' && !$this->ruleApplicable) {
                        $this->isAllRulePass = false;
                        break;
                    }
                    
                    if (end($group['rules']) == $rule && $this->ruleApplicable) {
                        $this->isAllRulePass = true;
                    }

                    if ($this->updateGroupPass()) {
                        break;
                    }
                }

                if ($this->rootMatchType != 'AND' && $this->updateGroupPass()) {
                    break;
                }

                if ($this->rootMatchType == 'AND' && !$this->isAllRulePass) {
                    $this->isAllGroupPass = false;
                    break;
                }

            }

            if ($this->rootMatchType != 'AND' && $this->updateGroupPass()) {
                break;
            }

            if ($this->rootMatchType == 'AND' && !$this->isAllRulePass) {
                $this->isAllGroupPass = false;
                //break;
            } else {
                $this->isAllGroupPass = true;
            }

            if ($this->isAllRulePass && $this->isAllGroupPass = true) {
                break;
            }
        }

    }

    /**
     * default commission
     *
     * @param $isZero
     * @param $isDistributed
     * @return void
     */
    public function getCommissionFromDefault($isZero = false, $isDistributed = true)
    {
        $commission = $this->defaultCommission;
        $this->commissionAmount = $isZero ? 0 : $commission->commission;
        $this->levelNumber = $isZero ? 1 : $commission->level;
        $this->commissionLevel = $isZero ? null : $commission->level_commission;
        $this->commissionType = $isZero ? null : $commission->commission_type;
        $this->isAllGroupPass = true;

        if ($isDistributed) {
            $this->commissionDistribute(true);
        }
    }

    /**
     * check affiliate user
     *
     * @return bool
     */
    protected function checkAffiliateUser()
    {
        if ($this->condition == 'any') {
            return in_array($this->affiliateUser['id'], $this->ruleValues);
        }

        return !in_array($this->affiliateUser['id'], $this->ruleValues);
    }

    /**
     * check affiliate tags
     *
     * @return bool
     */
    protected function checkAffiliateTag()
    {
        $affiliateUserTags = AffiliateUserTag::where('affiliate_user_id', $this->affiliateUser['id'])->get();

        foreach ($affiliateUserTags as $tag) {

            if ($this->condition == 'any' && in_array($tag->affiliate_tag_id, $this->ruleValues)) {
                return true;
            }
        }

        if ($this->condition == 'none') {
            return true;
        }

        return false;
    }

    /**
     * check package
     *
     * @return bool
     */
    protected function checkPackage($id)
    {
        if ($this->condition == 'any') {
            return in_array($id, $this->ruleValues);
        }

        return !in_array($id, $this->ruleValues);
    }

    /**
     * check credit
     *
     * @return bool
     */
    protected function checkCredit($id)
    {
        if ($this->condition == 'any') {
            return in_array($id, $this->ruleValues);
        }

        return !in_array($id, $this->ruleValues);
    }

    /**
     * check is all group pass or not
     *
     * @return true
     */
    protected function updateGroupPass()
    {
        if ($this->isAllRulePass && $this->rootMatchType == 'OR') {
            $this->isAllGroupPass = true;
        }

        return $this->isAllGroupPass;
    }

    /**
     * commission distribute between referrence user
     *
     * @param $isDefault
     * @return array|mixed|void
     */
    protected function commissionDistribute($isDefault = false)
    {
        if ($this->isAllGroupPass) {

            $productWiseRefUser = [];
            if (!$isDefault) {
                $this->matchingId[] = $this->commissionId;
            }

            if ($this->commissionType == 'flat') {
                $logAmount = $this->commissionAmount;
                $this->totalCommission[$this->affiliateUser['id']] = isset($this->totalCommission[$this->affiliateUser['id']]) ? $this->totalCommission[$this->affiliateUser['id']] + $this->commissionAmount : $this->commissionAmount;
            } else {
                $logAmount = ($this->packagePrice * $this->commissionAmount) / 100;
                $this->totalCommission[$this->affiliateUser['id']] = isset($this->totalCommission[$this->affiliateUser['id']]) ? $this->totalCommission[$this->affiliateUser['id']] + ($this->packagePrice * $this->commissionAmount) / 100 : ($this->packagePrice * $this->commissionAmount) / 100;
            }

            $this->commissionArray[$this->affiliateUser['id']] = [
                'affiliate_user_id' => $this->affiliateUser['id'],
                'commission' => $this->totalCommission[$this->affiliateUser['id']],
            ];

            $productWiseRefUser[$this->affiliateUser['id']] = $logAmount;

            if ($this->levelNumber > 1 && !empty($this->findReferralUser)) {
                $parentDetails = $this->findReferralUser;

                foreach ($this->commissionLevel as $key => $amount) {

                    if (isset($parentDetails) && $key != 'T1') {

                        if ($parentDetails->affiliateUserReference->status == 'Active') {

                            if ($this->commissionType == 'flat') {
                                $logAmount = $amount;
                                $this->totalCommission[$parentDetails->reference_by] = isset($this->totalCommission[$parentDetails->reference_by]) ?  $this->totalCommission[$parentDetails->reference_by] + $amount : $amount;
                            } else {
                                $logAmount = ($this->packagePrice * $amount) / 100;
                                $this->totalCommission[$parentDetails->reference_by] = isset($this->totalCommission[$parentDetails->reference_by]) ? $this->totalCommission[$parentDetails->reference_by] + ($this->packagePrice * $amount) / 100 : ($this->packagePrice * $amount) / 100;
                            }


                            $this->commissionArray[$parentDetails->reference_by] = [
                                'affiliate_user_id' => $parentDetails->reference_by,
                                'commission' => $this->totalCommission[$parentDetails->reference_by],
                            ];

                            $productWiseRefUser[$parentDetails->reference_by] = $logAmount;
                        }

                        $parentDetails = $parentDetails->parent;
                    }

                }

            }

            $this->commissionLogs[$this->packageId] = $productWiseRefUser;

            return $this->commissionArray;

        }

        $this->getCommissionFromDefault();
    }

    /**
     * get total commission
     *
     * @return array|mixed
     */
    protected function totalCommissionAmount()
    {
        return [
            'commissionData' => $this->commissionArray,
            'commission_logs' => $this->commissionLogs,
        ];
    }
}
