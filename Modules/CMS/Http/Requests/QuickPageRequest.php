<?php

namespace Modules\CMS\Http\Requests;

use App\Rules\CheckValidFile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuickPageRequest extends FormRequest
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
            'name' => 'required|min:3|max:150',
            'slug' => ['required', 'min:3', 'max:191', Rule::unique('pages', 'slug')->ignore($this->id)],
            'status' => 'nullable|in:Active,Inactive',
        ];
    }
}
