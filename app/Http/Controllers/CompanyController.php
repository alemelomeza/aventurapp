<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CompanyController extends Controller
{

    public function index()
    {
        return view('admin.companies.index')->with('companies',\App\Company::all());
    }

    public function create()
    {
        $users = \App\User::where('role','company')->get();
        $company_users_available =  $users->filter(function( $u){
            if($u->company == null){   
                return $u;
            }
        });
        return view('admin.companies.create')->with('users', $company_users_available);
    }


    public function store(Request $request)
    {

      $this->validate($request, [
          'name' => 'required',
          'email' => 'max:50'
        ]);

        $company = \App\Company::create($request->all());

        $photo_name = '/storage/companies/'.$company->name.'_id'.$company->id.'.png';
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photo));
        file_put_contents(public_path('/storage/companies/').$company->name.'_id'.$company->id.'.png', $data);
        $company->logo_path = $photo_name;
        $company->save();
        return redirect('/companies');
    }


    public function show(Company $company)
    {
        //
    }


    public function edit(Company $company)
    {
        $users = \App\User::where('role','company')->get();
        $company_users_available =  $users->filter(function( $u){
            if($u->company == null){   
                return $u;
            }
        });
        $company_users_available->push($company->user);
        return view('admin.companies.edit')
            ->with('company',$company)
            ->with('users', $company_users_available);
    }


    public function update(Request $request, Company $company)
    {

        $company->update($request->all());

        if($request->photo){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photo));
            file_put_contents(public_path('/storage/companies/').$company->name.'_id'.$company->id.'.png', $data);
            $photo_name = '/storage/companies/'.$company->name.'_id'.$company->id.'.png';
            $company->logo_path = $photo_name;
            $company->save();
        }
        
        return redirect('/companies');
    }


    public function destroy(Company $company)
    {
      $company->delete();
      return redirect('/companies');
    }
}
