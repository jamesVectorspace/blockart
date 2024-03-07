<?php

/**
 * @package Iyzico Martvill
 * @author Md. Mostafijur Rahman <mostafijur.techvill@gmail.ocm>
 * @created 05-09-2023
 */

namespace Modules\Iyzico\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IyzicoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return moduleConfig('iyzico.validation')['rules'];
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
        return moduleConfig('iyzico.validation')['attributes'];
    }

}

