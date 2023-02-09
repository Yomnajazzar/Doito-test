<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'name' => ['required' , 'string'],
            'email' => ['nullable','email' , 'unique:companies,email,'.$this->company->id],
            'logo'  => ['nullable ','file','mimes:jpeg,bmp,png', 'image','dimensions:min_width=100,min_height=100'],
            'websit'=> ['nullable','url']
        ];
    }
}
