<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Employee;

class UPEmpStoreRequest extends FormRequest
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
    public function rules(Request $req, Employee $compani)
    {
        // $employee = Employee::find($req->id);
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:companies,email,' . $req->id,
            'contact' => 'required',

        ];
    }
}
