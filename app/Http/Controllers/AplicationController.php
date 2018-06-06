<?php

namespace App\Http\Controllers;

use App\Aplication;
use Illuminate\Http\Request;

class AplicationController extends Controller
{

    public function index()
    {
        return view('admin.aplications.index')->with('aplications',Aplication::all());
    }

    public function create()
    {
        return view('admin.aplications.create')->with('companies',\App\Company::all());
    }


    public function store(Request $request)
    {
        
    }


    public function show(Aplication $aplication)
    {
        //
    }


    public function edit(Aplication $aplication)
    {
        //
    }


    public function update(Request $request, Aplication $aplication)
    {
        //
    }


    public function destroy(Aplication $aplication)
    {
        //
    }
}
