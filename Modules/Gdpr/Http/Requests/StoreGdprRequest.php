<?php

namespace Modules\Gdpr\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGdprRequest extends FormRequest
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
            'is_gdpr_enable' => ['nullable'],
            'gdpr_text_en' => ['required_if:is_gdpr_enable,1', 'max:900'],
            'gdpr_text_en.gdpr_confirm_button_text' => ['required_if:is_gdpr_enable,1', 'max:45'],
            'gdpr_text_en.gdpr_policy_button_text' => ['required_if:is_gdpr_enable,1', 'max:45'],
            'gdpr_text_en.gdpr_message' => ['required_if:is_gdpr_enable,1', 'max:255'],
            'gdpr_life_time' => ['required_if:is_gdpr_enable,1'],
            'gdpr_policy_link' => ['required_if:is_gdpr_enable,1', 'max:255'],
            'is_external_gdpr_enable' => ['nullable'],
            'gdpr_external_script' => ['required_if:is_external_gdpr_enable,1'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'gdpr_text_en.gdpr_message.required_if' => __('The GDPR message field is required when GDPR is enable.'),
            'gdpr_text_en.gdpr_confirm_button_text.required_if' => __('The GDPR button text field is required when GDPR is enable.'),
            'gdpr_life_time.required_if' => __('The GDPR life time field is required when GDPR is enable.'),
            'gdpr_policy_link.required_if' => __('The GDPR policy link field is required when GDPR is enable.'),
            'gdpr_text_en.gdpr_policy_button_text.required_if' => __('The GDPR policy button text field is required when GDPR is enable.'),
            'gdpr_external_script.required_if' => __('The GDPR Service Script field is required when GDPR Service is enable.'),
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'gdpr_text_en.gdpr_confirm_button_text' => __('Confirm button text'),
            'gdpr_text_en.gdpr_policy_button_text' => __('Policy link button text'),
            'gdpr_text_en.gdpr_message' => __('Message'),
            'is_gdpr_enable' => __('GDPR'),
        ];
    }
}
