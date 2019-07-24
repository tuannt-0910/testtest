<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Config;
use Session;

class UserEditRequest extends FormRequest
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
        Session::flash('user', $this->all());

        return [
            'username' => 'required|max:90',
            'firstname' => 'required|max:90',
            'lastname' => 'required|max:90',
            'address' => 'required|max:90',
            'phone' => 'required|max:12',
            'email' => 'required|email|unique:users,email|max:90',
            'birthday' => 'required',
            'avatar'=>'image|mimes:jpeg,png,jpg,gif|max:5120',
            'role' => 'required',
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
            'username.required' => Config::get('constant.input_errors.username_required'),
            'username.max' => Config::get('constant.input_errors.username_max'),
            'firstname.required' => Config::get('constant.input_errors.firstname_required'),
            'firstname.max' => Config::get('constant.input_errors.firstname_max'),
            'lastname.required' => Config::get('constant.input_errors.lastname_required'),
            'lastname.max' => Config::get('constant.input_errors.lastname_max'),
            'address.required' => Config::get('constant.input_errors.address_required'),
            'address.max' => Config::get('constant.input_errors.address_max'),
            'phone.required' => Config::get('constant.input_errors.phone_required'),
            'phone.max' => Config::get('constant.input_errors.phone_max'),
            'email.required' => Config::get('constant.input_errors.email_required'),
            'email.email' => Config::get('constant.input_errors.email_email'),
            'email.unique' => Config::get('constant.input_errors.email_unique'),
            'email.max' => Config::get('constant.input_errors.email_max'),
            'birthday.required' => Config::get('constant.input_errors.birthday_required'),
            'avatar.max' => Config::get('constant.input_errors.avatar_max'),
            'avatar.mimes' => Config::get('constant.input_errors.avatar_mimes'),
            'role.required' => Config::get('constant.input_errors.role_required'),
        ];
    }
}
