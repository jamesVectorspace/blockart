<?php

/**
 * @package Paypal recurring Request
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 21-05-23
 */

namespace Modules\PaypalRecurring\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaypalRecurringRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return moduleConfig('paypalrecurring.validation')['rules'];
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
        return moduleConfig('paypalrecurring.validation')['attributes'];
    }
}
