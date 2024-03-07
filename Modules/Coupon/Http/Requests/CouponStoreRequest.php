<?php

namespace Modules\Coupon\Http\Requests;

use App\Rules\CheckValidDate;
use App\Rules\DateCompare;
use Illuminate\Foundation\Http\FormRequest;

class CouponStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $condition = empty($this->minimum_spend) ? '' : 'lt:minimum_spend';
        $maximumDiscount = $this->maximum_discount_amount == '0' ? 'gt:0' : '';
        
        return [
            'name' => 'required|min:3|max:30',
            'code' => 'required|min:3|max:30|unique:coupons,code',
            'creator_id' => 'required',
            'usage_limit_per_coupon' => 'nullable|max:11',
            'usage_limit_per_user' => 'nullable|max:11',
            'individual_use' => 'required|in:0,1',
            'is_private' => 'required|in:0,1',
            'discount_type' => 'required|in:Flat,Percentage',
            'minimum_spend' => ['nullable', 'regex:/^[0-9]{1,8}(\.[0-9]{1,8})?$/'],
            'discount_amount' => ['required', 'regex:/^[0-9]{1,8}(\.[0-9]{1,8})?$/', $condition],
            'maximum_discount_amount' => ['nullable', 'regex:/^[0-9]{1,8}(\.[0-9]{1,8})?$/', $maximumDiscount],
            'start_date' => ['required', new CheckValidDate()],
            'end_date' => ['required', new CheckValidDate(), new DateCompare($this->start_date)],
            'status' => 'required|in:Active,Inactive,Expired',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'discount_amount' => validateNumbers($this->discount_amount),
            'minimum_spend' => validateNumbers($this->minimum_spend),
            'maximum_discount_amount' => $this->maximum_discount_amount ? validateNumbers($this->maximum_discount_amount) : null,
            'start_date' => isset($this->start_date) ? DbDateFormat($this->start_date) : null,
            'end_date' => DbDateFormat($this->end_date),
            'individual_use' => isset($this->individual_use) ? 1 : 0,
            'is_private' => isset($this->is_private) ? 1 : 0,
            'creator_id' => auth()->user()->id
        ]);
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        $discountType = ['Flat' => __('amount'), 'Percentage' => __('percentage')];
        
        return [
            'discount_amount.lt' => __('Minimum spend must be greater than Discount amount.'),
            'discount_amount.regex' => __('Discount :x format is invalid.', ['x' => $discountType[$this->discount_type]]),
            'maximum_discount_amount.gt' => __('Maximum discount must be greater than 0')
        ];
    }
}
