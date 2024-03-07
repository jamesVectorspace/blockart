<?php

/**
 * @package StripeRecurringRequest
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 02-04-2023
 */

namespace Modules\StripeRecurring\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StripeRecurringRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return moduleConfig('striperecurring.validation')['rules'];
    }

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
     * Attributes custom names
     *
     * @return array
     */
    public function attributes()
    {
        return moduleConfig('striperecurring.validation')['attributes'];
    }
}
