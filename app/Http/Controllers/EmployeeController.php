<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\Employee\EmpStoreRequest;
use App\Http\Requests\Employee\UPEmpStoreRequest;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = Employee::with('ShowCompany')->paginate(3);
        Paginator::useBootstrap();
        return view('project.Employee.emptable')->with('value', $values);
        // return view('project.cmp_emp');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $values = Company::all();
        return view('project.Employee.emp_reg')->with('value', $values);

        // $values = Company::all();
        // // dd($values);
        // return view('project.emp_reg')->with('values', $values);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpStoreRequest $request)
    {
        $employee = new Employee;
        $employee->company_id = $request->value_id;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->contact = $request->contact;
        $employee->save();
        $request->session()->flash('success', 'Your Data inserted successfully ');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo "manihsa";
        $employee = Employee::find($id);
        
        return view('project.Employee.showEmp', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $value = Company::all();
        $employee = Employee::find($id);
        return view('project.Employee.editEmp',compact('employee','value'));

        // $values = Company::all();
        // return view('project.emp_reg')->with('value', $values);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UPEmpStoreRequest $request, $id)
    {
        $employee =  Employee::find($id);
        // $employee = new Employee;
        $employee->company_id = $request->value_id;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->contact = $request->contact;
        $employee->update();
        $request->session()->flash('info', 'Your Data updated successfully ');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request )
    {
        $employee = Employee::find($id);
        $employee->delete();
        $request->session()->flash('warning', 'Your Data Deleted successfully ');
        return redirect()->route('employee.index');
    }
}
