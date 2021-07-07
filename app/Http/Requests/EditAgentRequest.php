<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditAgentRequest extends FormRequest
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
            'name' => 'required',
            'email' => ['required','email:rfc,dns',Rule::unique('products','email')->ignore($this->id)],
            'code'=>'required',
            'phone'=>'required|regex:/(0)[0-9]{10}/',
            'manager'=>'required',
            'address'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "This field can't be empty",
            'email.required' => "This field can't be empty",
            'code.required' => "This field can't be empty",
            'phone.required' => "This field can't be empty",
            'address.required' => "This field can't be empty",
            'manager.required' => "This field can't be empty",
            'phone.regex'=>'Wrong phone format',
            'email.email'=>'Wrong email format',
            'email.unique' => "This email is existed",
        ];
    }
}
