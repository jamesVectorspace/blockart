<?php

namespace Modules\Subscription\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Subscription\Rules\DecimalValidator;

class PackageStoreRequest extends FormRequest
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
        return [
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:100',
            'code' => 'nullable|min:3|max:45|unique:packages,code',
            'short_description' => 'nullable|max:191',
            'sale_price.*' => ['nullable', new DecimalValidator],
            'discount_price.*' => ['nullable', 'lte:sale_price.*', new DecimalValidator],
            'billing_cycle' => 'required',
            'sort_order' => 'nullable|numeric',
            'trial_day' => 'nullable|numeric',
            'usage_limit' => 'nullable|numeric',
            'renewable' => 'required|boolean',
            'status' => 'required|in:Active,Pending,Inactive,Expired,Cancel',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $data = [];
        
        foreach ($this->sale_price as $key => $value) {
            $data["sale_price"][$key] = validateNumbers($value);
            $data["discount_price"][$key] = $this->discount_price[$key] ? validateNumbers($this->discount_price[$key]) : null;
        }
        $data['billing_cycle'] = in_array('1', $this->billing_cycle) ? $this->billing_cycle : '';
        
        $this->merge($data);
    }
}
