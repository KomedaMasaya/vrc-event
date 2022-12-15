<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Event_DateTime;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //$events = Event::find(1);
        $events = Event::all();
        //$events = Event::with('event')->get();
        //dd($events);
        //$events = Event::with('event_datetimes')->get();
        //return view('event.index', compact('event'));
        //return view('event.index')
        //->with('events','$events');
        return view("event.index", ["events" => $events]);
        //dd($events);
    }
}
