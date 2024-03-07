<?php

namespace Modules\Affiliate\Entities;

use App\Models\User;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Modules\Affiliate\Services\AffiliateHelper;
use Modules\Coupon\Http\Models\CouponMeta;
use Modules\Affiliate\Entities\Form;

class AffiliateUser extends Model
{
    use ModelTrait;
    protected $fillable = [];

    private static $limit = 10;

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function scopeActiveUser($query)
    {
        $query->where('status', 'Active');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function referral()
    {
        return $this->hasMany('Modules\Affiliate\Entities\Referral', 'affiliate_user_id', 'id');
    }

    public function referralAffiliateUsers()
    {
        return $this->hasMany('Modules\Affiliate\Entities\ReferralUser', 'reference_by', 'id');
    }

    public function referralUser()
    {
        return $this->hasOne('Modules\Affiliate\Entities\ReferralUser', 'user_id', 'user_id');
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function affiliateTags()
    {
        return $this->hasMany('Modules\Affiliate\Entities\AffiliateUserTag', 'affiliate_user_id', 'id');
    }

    public function referrals()
    {
        return $this->hasMany('Modules\Affiliate\Entities\Referral', 'affiliate_user_id', 'id');
    }

    public function referralPurchases()
    {
        return $this->hasMany('Modules\Affiliate\Entities\ReferralPurchase', 'affiliate_user_id', 'id');
    }

    public function incrementRevenue($value = 0): void
    {
        $this->increment('revenue', $value);
    }

    public function decrementRevenue($value = 0): void
    {
        $this->decrement('revenue', $value);
    }

    public function decrementNetCommission($value = 0): void
    {
        $this->decrement('net_commission', $value);
    }

    public function incrementNetCommission($value = 0): void
    {
        $this->increment('net_commission', $value);
    }

    public function incrementPaid($value = 0): void
    {
        $this->increment('paid_amount', $value);
    }

    /**
     * Return the maximum limit
     * @param int|null $limit
     * @return int
     */
    public static function getLimit($limit = null)
    {
        return $limit && $limit > 0 ? $limit : self::$limit;
    }

    /**
     * store
     *
     * @param $request
     * @return true
     */
    public static function store($request)
    {
        $helper = AffiliateHelper::getInstance();
        $user= parent::create([
            'user_id' => auth()->user()->id,
            'content' => $request,
            'status' => $helper->getUserStatus(),
        ]);

        if (!empty($user)) {
            $referralUser = ReferralUser::where('user_id', auth()->user()->id);

            if ($referralUser->exists()) {
                $referralUser->update(['affiliate_user_id' => $user->id]);
            }
        }

        return true;
    }

    /**
     * update
     *
     * @param $data
     * @param $id
     * @return bool
     */
    public static function updateUser($data, $id)
    {
        $result = parent::where('id', $id);

        if ($result->exists()) {
            $result->update($data);
            return true;
        }

        return false;
    }

    /**
     * remove
     *
     * @param $id
     * @return array
     */
    public static function remove($id)
    {
        $data = ['type' => 'fail', 'message' => __('Something went wrong, please try again.')];
        $userInfo = parent::find($id);

        if (!empty($userInfo)) {
            $userInfo->delete();
            $data = ['type' => 'success', 'message' => __('The :x has been successfully deleted.', ['x' => __('User')])];
        }

        return $data;
    }

    /**
     * get identifier
     *
     * @return mixed
     */
    public function getIdentifier()
    {
        if (empty($this->identifier)) {
            return $this->id;
        }

        return $this->identifier;
    }

    /**
     * load affiliate from submission data
     *
     * @return void
     */
    public function loadSubmissionIntoFormJson(): void
    {
        $submission_content = $this->content;

        $n = collect($this->form->form_builder_array)
            ->map(function ($entry) use ($submission_content) {
                if (
                    !empty($entry['name']) &&
                    array_key_exists($entry['name'], $submission_content)
                ) {
                    // the field has a 'name' which means it is not a header or paragraph
                    // and the user previously have an entry for that field in the $submission_content
                    $current_submitted_val = $submission_content[$entry['name']] ?? '';
                    if ($entry['type'] == 'file') {
                        $array = explode("/", $current_submitted_val);
                        $entry['data-title'] = end($array);
                        $current_submitted_val = objectStorage()->url('public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $current_submitted_val);
                        $entry['data-url'] = $current_submitted_val;
                    }

                    if ((empty($entry['value']) && empty($entry['values']))) {
                        // for input types that do not get their values from a 'values' array
                        // set the staight 'value' string and move on
                        $entry['value'] = $current_submitted_val;
                    } else if (!empty($entry['values'])) {
                        // this will hold what will think is the value of the 'other' input
                        // in a checkbox-group that allows the 'other' option
                        $otherInputVal = null;

                        // manipulate the values array so we can preselect the entries that
                        // were chosen in the submission we have on file.
                        if (is_array($current_submitted_val)) {
                            $entry['values'] = collect($entry['values'])
                                ->map(function ($v) use ($current_submitted_val) {
                                    // if this value in the 'values' array is in the
                                    // previous selection made by the user in their
                                    // submission, we will add the selected and checked
                                    // flag to the value so that it will be pre-selected
                                    // when we render the form
                                    if (in_array($v['value'], $current_submitted_val)) {
                                        $v['selected'] = true;
                                        $v['checked'] = 'checked';
                                    }

                                    return $v;
                                })
                                ->toArray();
                        }

                        // check if the 'other' input option is available
                        if (!empty($entry['other']) && $entry['other'] === true) {
                            // let's attempt to get the value that was provided via the
                            // 'other' input field of a checkbox-group
                            // get the submitted value that is not part of the 'values'
                            // array for this entry
                            $values_names = collect($entry['values'])
                                ->map(function ($v) {
                                    return $v['value'];
                                })
                                ->toArray();

                            $other = collect($current_submitted_val)
                                ->filter(function ($sv) use ($values_names) {
                                    return !in_array($sv, $values_names);
                                })
                                ->values();

                            $otherInputVal = $other[0] ?? null;
                        }

                        // still set the value on the entry as we have it
                        $entry['value'] = $otherInputVal ?? $current_submitted_val;
                    } elseif (!empty($entry['value']) && isset($submission_content[$entry['name']]) && $submission_content[$entry['name']]) {
                        $entry['value'] = $submission_content[$entry['name']];
                    }
                }

                return $entry;
            });
        $this->form->form_builder_json = $n;
    }

    /**
     * Turn the current value we are trying to display to string we can actually display
     *
     * @param string $key
     * @param string $type the type of the input type that this key belongs to on the form
     * @param boolean $limit_string
     * @return Illuminate\Support\HtmlString
     */
    public function renderEntryContent($key, $type = null, $limit_string = false): HtmlString
    {
        $str = '';

        if (
            !empty($this->content[$key]) &&
            is_array($this->content[$key])
        ) {
            $str = implode(', ', $this->content[$key]);
        } else {
            $str = $this->content[$key] ?? '';
        }

        if ($limit_string) {
            $str = Str::limit($str, 20, '');
        }

        if ($type == 'date' && isset($this->content[$key])) {
            $str = timeZoneFormatDate($this->content[$key]);
        }

        // if the type is 'file' then we have to render this as a link
        if ($type == 'file') {
            if (isset($this->content[$key])) {
                $file_link = objectStorage()->url('public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $this->content[$key]);
                $str = "<a href='{$file_link}' target='__blank'><i class='feather icon-file-text mr-1'></i>" . __('Show file') . "</a>";
            } else {
                $str = __('No file');
            }
        }

        return new HtmlString($str);
    }

    /**
     * check allow lifetime customer
     *
     * @return bool
     */
    public function isAllowLifeTimeCustomer(): bool
    {
        $status = false;

        if (preference('lifetime_commission') == 1) {
            $excludeUser = !empty(preference('lifetime_exclude_user')) ? json_decode(preference('lifetime_exclude_user')) : [];
            $excludeTags = !empty(preference('lifetime_exclude_tags')) ? json_decode(preference('lifetime_exclude_tags')) : [];
            $hasTag = false;

            foreach ($this->affiliateTags as $tag) {

                if (in_array($tag->affiliate_tag_id, $excludeTags)) {
                    $hasTag = true;
                    break;
                }
            }

            if(!in_array($this->id, $excludeUser) && !$hasTag) {
                $status = true;
            }
        }

        return $status;
    }

    /**
     * store coupon
     *
     * @param $affiliateUserId
     * @param $couponId
     * @return bool
     */
    public static function affiliateCoupon($affiliateUserId, $couponId)
    {
        $couponMeta = [
            'coupon_id' => $couponId,
            'type' => 'string',
            'key' => 'affiliate_user_id',
            'value' => $affiliateUserId

        ];
        if (isset($request->allow_free_shipping)) {
            $couponMeta['value'] = 1;
        }

        return (new CouponMeta)->store($couponMeta);
    }

    /**
     * get affiliate coupon
     *
     * @param $coupon
     * @return mixed
     */
    public static function getAffiliateCoupon($coupon)
    {
        $data = $coupon->metadata()->where('key', 'affiliate_user_id')->first();
        $id = isset($data->value) && !empty($data->value) ? $data->value : null;

        return parent::where('id',$id)->first();
    }

    /**
     * affiliate user tag
     *
     * @return string
     */
    public function affiliateUserTag()
    {
        $tagName = [];

        foreach ($this->affiliateTags as $tag) {
            $tagName[] = $tag->tag->name;
        }

        return count($tagName) > 0 ? implode(" , ", $tagName) : 'N/A';
    }

}
