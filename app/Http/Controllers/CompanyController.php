<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use  App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpadateRequest;
use SweetAlert;



class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function showtable(CompanyDataTable $dataTable)
    // {
    //     return $dataTable->render('cmp');
    // }
    public function index(CompanyDataTable $dataTable)
    {

        $data = Company::get();
        return $dataTable->render('project.Company.table');
        
        //  $values = Company::paginate(3);
        // Paginator::useBootstrap();
        //  return view('project.Company.table')->with('value', $values);

    

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("project.Company.registration");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $req)
    {
        $compani = new Company;
        $compani->name = $req->name;
        $compani->email = $req->email;
        $compani->website = $req->website;
        if ($req->hasFile('logo')) {
            $file = $req->file('logo');
            $extension = $file->getclientoriginalextension();
            $filename = time().'.'. $extension;
            $file->move('upload/logo/', $filename);
            $compani->logo = $filename;
        }
        $compani->save();
        $req->session()->flash('success', 'Your Data inserted successfully ');
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compani =Company::find($id);
           return view('project.Company.show',compact('compani'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compani = Company::find($id);
      return view('project.Company.edit',compact('compani'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpadateRequest $req, $id)
    {
         $compani = Company::find($id);
         $compani->name = $req->name;
         $compani->email = $req->email;
         $compani->website = $req->website;
        if ($req->hasFile('logo')) 
        {
            $path = 'upload/logo/'.$compani->logo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $req->file('logo');
            $extension = $file->getclientoriginalextension();
            $filename = time() . '.' . $extension;
            $file->move('upload/logo/', $filename);
            $compani->logo = $filename;
        }
         $compani->update();
        $req->session()->flash('info', 'Recoreds Are Updates ');
        return redirect()->route('company.index');
        // return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $compani = Company::find($id);
        $compani->delete();
        $request->session()->flash('error', 'Recoreds Are Deleted ');
        return redirect()->route('company.index');
    }
}



