<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'email'=>'required|email|unique:companies,email,'.$this->company->id,
            'logo'=>'nullable|file',
     
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'email.email'=>'Email should be valid',
            'email.unique'=>'Email address already exist',
            'logo.file'=>'Logo should be a file',
         
        ];
    }
}
