<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Config;
use Session;

class LoginRequest extends FormRequest
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
        Session::flash('email', $this->email);

        return [
            'email' => 'required|email|max:200',
            'password' => 'required|max:200'
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
            'email.required' => Config::get('constant.input_errors.email_required'),
            'email.email' => Config::get('constant.input_errors.email_email'),
            'email.max' => Config::get('constant.input_errors.email_max'),
            'password.required' => Config::get('constant.input_errors.password_required'),
            'password.max' => Config::get('constant.input_errors.password_max'),
        ];
    }
}
