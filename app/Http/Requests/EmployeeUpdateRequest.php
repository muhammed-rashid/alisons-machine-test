<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'nullable|email|unique:employees,email,'.$this->employee->id,
            'company'=>'required|exists:companies,id',
            

        ];
    }

    public function messages(){
        return [
            'first_name.required'=>'First Name is required',
            'last_name.required'=>'Last Name is required',
         
            'email.email'=>'Email should be valid',
            'email.unique'=>'Email address already exist',
            'company.required'=>'company is required',
            'company.exists'=>'select a valida company'
        ];
    }
}
