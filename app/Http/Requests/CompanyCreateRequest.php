<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:companies,email',
            'logo'=>'required|image|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
        
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'email.email'=>'Email should be valid',
            'email.unique'=>'Email address already exist',
            'logo.required'=>'Logo is required',
            'logo.image'=>'Logo should be an image',
            'logo.mimes'=>'image should be valid image type'
          
        ];
    }
}
