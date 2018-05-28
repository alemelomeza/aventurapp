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
        //
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
        //
    }
}
