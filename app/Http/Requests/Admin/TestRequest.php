<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Config;
use Session;

class TestRequest extends FormRequest
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
        Session::flash('test', $this->all());

        return [
            'name' => 'required|max:90',
            'test_code' => 'required|max:90',
            'content_guide' => 'required|max:500',
            'execute_time' => 'required|max:3',
            'total_question' => 'required|max:3',
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
            'name.required' => Config::get('constant.input_errors.testname_required'),
            'name.max' => Config::get('constant.input_errors.testname_max'),
            'test_code.required' => Config::get('constant.input_errors.testcode_required'),
            'test_code.max' => Config::get('constant.input_errors.testcode_max'),
            'content_guide.required' => Config::get('constant.input_errors.content_guide_required'),
            'content_guide.max' => Config::get('constant.input_errors.content_guide_max'),
            'execute_time.required' => Config::get('constant.input_errors.execute_time_required'),
            'execute_time.max' => Config::get('constant.input_errors.execute_time_max'),
            'total_question.required' => Config::get('constant.input_errors.total_question_required'),
            'total_question.max' => Config::get('constant.input_errors.total_question_max'),
        ];
    }
}
