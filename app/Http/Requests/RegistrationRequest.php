<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistrationRequest extends Request
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
            'name' => 'required|alpha',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ];
    }

    public function message()
    {
        return [
            'name' => 'Full Name is required is required',
            'email' => 'Email is mandatory',
            'password' => 'The password is required'
        ];
    }
}
