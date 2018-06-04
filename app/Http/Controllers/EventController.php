<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use Carbon\Carbon;

class EventController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'range_date' => 'required',
            'leader_name' => 'required',
            'status' => 'required'
          ]);
          $dates =  explode("-", $request->range_date);
          $request->request->add(['start_date' => date_create_from_format("d/m/Y H:i:s",rtrim($dates[0]))->format('Y/m/d H:i:s') ]);
          $request->request->add(['end_date' => date_create_from_format("d/m/Y H:i:s",ltrim($dates[1]))->format('Y/m/d H:i:s') ]);
          $event = \App\Event::create($request->all());
          return redirect('/activities/'.$event->activity->id.'/events');

    }


    public function show(Event $event)
    {
        //
    }


    public function edit(Event $event)
    {
        //
    }


    public function update(Request $request, Event $event)
    {
        //
    }


    public function destroy(Event $event)
    {
      $id_ev = $event->id;
      $event->delete();
      return redirect('activities/'.$id_ev.'/events');
    }

}
