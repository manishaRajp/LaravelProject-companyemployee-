<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class EmpStoreRequest extends FormRequest
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
            'value_id' => 'required|not_in:0',
           'first_name' => 'required',
           'last_name'=> 'required',
           'email' => 'required|email',
          
           'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10 ', //chnage it letter
        ];
    }
    public function messages()
    {
        return[

            'first_name.required ' => 'A name is required'
        ];
    }
}
