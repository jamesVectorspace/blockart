<?php

namespace Modules\DatabaseBackup\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DropboxSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'app_key' => 'required|string',
            'app_secret' => 'required|string',
            'auth_token' => 'required|string',
        ];
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
}
