<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Company;

class UpadateRequest extends FormRequest
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
    public function rules(Request $req, Company $compani)
    {
        // dd($req->id);
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:companies,email,' .$req->id,
            'website' => 'required',
            'logo' => 'nullable',
        ];
    }
}
