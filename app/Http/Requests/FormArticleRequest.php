<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        return true;
        //return false;
        //by default its false but we will make it true to enable every user whether they are authenticated or not to submit form
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3', //u can add single like this in array and multiple like this'[required,min:3]'  
            'description' => 'required',
        ];
        //now go to the controller where u want to use this request paramater 
    }
}
