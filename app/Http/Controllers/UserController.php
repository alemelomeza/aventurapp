<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',\App\User::all());
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required',
          'email' => 'max:50',
          'role' => 'required',
          'password' => 'required'
        ]);
        \App\User::create($request->all());
        return redirect('/users');
    }

    public function show($id)
    {
        return view('admin.users.show')->with('user',\App\User::find($id));
    }

    public function edit($id)
    {
      return view('admin.users.edit')->with('user',\App\User::find($id));
    }

    public function update(Request $request, $id)
    {
      $user = \App\User::find($id);
      $this->validate($request, [
          'name' => 'required',
          'email' => 'max:50',
          'role' => 'required',
        ]);

        if($request->password && $request->password !='' )
        {
          $pass = bcrypt($request->password);
          $request->request->remove('password');
          $request->request->add(['password' => $pass]);
          $user->update($request->all());
        }
        else
        {
          $request->request->remove('password');
          $user->update($request->all());
        }
        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = \App\User::find($id);
        $user->delete();
        return redirect('/users');
    }

    public function assingEvent($id)
    {
        return view('admin.users.assing_event')
                              ->with('user', \App\User::find($id))
                              ->with('companies', \App\Company::all())
                              ->with('first_company', \App\Company::first());
    }


}
