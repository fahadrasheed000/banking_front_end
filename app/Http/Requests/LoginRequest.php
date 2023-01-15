<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'password' => 'required|min:8',
            'email' => 'required|email|max:255',
        ];
    }
    public function messages()
    {
        return [
           'email.required'=>'Please enter valid email address',
           'email.max'=>'Email should be less than 255 characters long',
        ];
    }
}
