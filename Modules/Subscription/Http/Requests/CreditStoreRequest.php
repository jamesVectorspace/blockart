<?php

namespace Modules\Subscription\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Subscription\Rules\DecimalValidator;

class CreditStoreRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'code' => 'required|min:3|max:45|unique:credits,code',
            'price' => ['nullable', new DecimalValidator],
            'sort_order' => 'required|numeric',
            'status' => 'required|in:Active,Inactive',
            'features.*' => 'required|numeric'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'price' => validateNumbers($this->price),
        ]);
    }
}
