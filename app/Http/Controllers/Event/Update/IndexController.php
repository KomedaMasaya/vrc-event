<?php

namespace App\Http\Controllers\Event\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Event_DateTime;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $eventId = (int) $request->route('eventId');
        $event = Event::where('id',$eventId)->firstOrFail();
        $event_datetimes = $event->event_datetimes;
        $event_datetime = $event_datetimes->first();

        return view('event.update')->with('event',$event)->with('event_datetime',$event_datetime);
    }
}