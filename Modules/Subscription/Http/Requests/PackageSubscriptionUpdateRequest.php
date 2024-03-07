<?php

namespace Modules\Subscription\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Subscription\Rules\DecimalValidator;

class PackageSubscriptionUpdateRequest extends FormRequest
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
            'user_id' => 'nullable|exists:users,id',
            'package_id' => 'required|exists:packages,id',
            'billing_price' => ['required', new DecimalValidator],
            'billing_cycle' => 'required|in:days,weekly,monthly,yearly',
            'amount_billed' => ['required', new DecimalValidator],
            'amount_received' => ['required', new DecimalValidator],
            'amount_due' => ['required', new DecimalValidator],
            'is_customized' => 'required|boolean',
            'renewable' => 'nullable|boolean',
            'payment_status' => 'required|in:Paid,Unpaid',
            'status' => 'required|in:Active,Pending,Inactive,Expired,Cancel',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'billing_price' => validateNumbers($this->billing_price),
            'amount_billed' => validateNumbers($this->amount_billed),
            'amount_received' => validateNumbers($this->amount_received),
            'amount_due' => validateNumbers($this->amount_due)
        ]);
    }
}
