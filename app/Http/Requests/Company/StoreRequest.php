<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\UpperCase;


class StoreRequest extends FormRequest
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

            'name' => ['required','max:255','unique:companies',new UpperCase],
            'email' => 'required|email|unique:companies|',
            'website' => 'required|url',
            'logo' => 'required|mimes:jpg,bmp,png',

        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'A name must be capital',
            'website.url' => 'please use http url',
        ];
    }
}