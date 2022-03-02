<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Company;

class AuthController extends Controller
{
    // function Form(){
    //     return redirect('project.registration');
    // }
    public function display()
    {
        $data= Company::all();
        return view('project.table',['value'=>$data]);
    }
}
