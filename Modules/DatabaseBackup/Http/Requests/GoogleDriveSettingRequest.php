<?php

namespace Modules\DatabaseBackup\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoogleDriveSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id' => 'required|string',
            'client_secret' => 'required|string',
            'refresh_token' => 'required|string',
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
