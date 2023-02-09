<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'first_name' => ['required' , 'string'],
            'last_name' => ['required' , 'string'],
            'email' => ['nullable' , 'email' , 'unique:employees,email'],
            'phone' => [ 'nullable' , 'string','min:10','max:10' , 'unique:employees,phone'],
            'company_id' => ['required','exists:companies,id']
        ];
    }
}
