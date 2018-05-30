<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
        return view('admin.companies.index')->with('companies',\App\Company::all());
    }


    public function create()
    {
        return view('admin.companies.create');
    }


    public function store(Request $request)
    {

      $this->validate($request, [
          'name' => 'required',
          'email' => 'max:50'
        ]);
        $photo_name = '/img/companies/'.$request->name.'.png';
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photo));
        file_put_contents(public_path('/img/companies/').$request->name.'.png', $data);

        $request->request->add(['logo_path' => $photo_name]);
        \App\Company::create($request->all());
        return redirect('/companies');
    }


    public function show(Company $company)
    {
        //
    }


    public function edit(Company $company)
    {
        //
    }


    public function update(Request $request, Company $company)
    {
        //
    }


    public function destroy(Company $company)
    {
      $company->delete();
      return redirect('/companies');
    }
}
