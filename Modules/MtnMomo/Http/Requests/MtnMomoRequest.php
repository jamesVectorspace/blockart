<?php

/**
 * @package MtnMomoRequest
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 12-02-2023
 */

namespace Modules\MtnMomo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MtnMomoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return moduleConfig('mtnmomo.validation')['rules'];
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
        return moduleConfig('mtnmomo.validation')['attributes'];
    }
}
