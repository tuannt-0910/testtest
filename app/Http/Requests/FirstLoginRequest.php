<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Config;

class FirstLoginRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required|min:6|max:25',
            'confirm_password' => 'required|same:new_password',
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
            'old_password.required' => Config::get('constant.input_errors.old_password_required'),
            'new_password.required' => Config::get('constant.input_errors.new_password_required'),
            'new_password.min' => Config::get('constant.input_errors.new_password_min'),
            'new_password.max' => Config::get('constant.input_errors.new_password_max'),
            'confirm_password.required' => Config::get('constant.input_errors.confirm_password_required'),
            'confirm_password.same' => Config::get('constant.input_errors.confirm_password_same'),
        ];
    }
}
