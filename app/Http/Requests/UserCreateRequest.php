<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'country' => ['required', 'alpha'],
            'city' => ['required', 'alpha'],
            'address' => ['required', 'string',],
            'contact' => ['required', 'digits:11'],
            'cnic' => ['required', 'digits:13','unique:users'],
            'role' => ['required','not_in:0',],
        ];
    }
}
