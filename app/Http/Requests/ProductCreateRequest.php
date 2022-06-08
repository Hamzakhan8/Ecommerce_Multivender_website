<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'title' => ['required', 'regex:/^[\pL\s\- 0-9_]+$/u', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required'],
            'subcategory' => ['required'],
            'price' => ['required'],
            'image' => ['required',],
            
        ];
    }
}
