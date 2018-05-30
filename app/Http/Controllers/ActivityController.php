<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function index()
    {
        return view('admin.activities.index')->with('activities', \App\Activity::all());
    }


    public function create()
    {
        return view('admin.activities.create')->with('companies', \App\Company::all());
    }


    public function store(Request $request)
    {
      $this->validate($request, [
          'title' => 'required',
          'status' => 'required',
          'cost' => 'required'
        ]);

        \App\Activity::create($request->all());
        return redirect('/activities');
    }


    public function show(Activity $activity)
    {
        return view('admin.activities.show')->with('activity', $activity);
    }


    public function edit(Activity $activity)
    {
        return view('admin.activities.edit')->with('activity', $activity);
    }


    public function update(Request $request, Activity $activity)
    {
        //
    }

    public function destroy(Activity $activity)
    {
        if($activity->events)
        {
          foreach ($activity->events as $event)
          {
            $event->delete();
          }
        }
        $activity->delete();
        return redirect('/activities');
    }
}
