<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EventService;
use App\Models\Event;
use App\Models\Event_DateTime;

class EventPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, EventService $eventService)
    {
        $path = $eventService->getImages();
        $user = $eventService->getUser();
        $eventId = (int) $request->route('eventId');
        $event = Event::where('id', $eventId)->firstOrFail();
        $event_datetimes = $event->event_datetimes;
        $event_datetime = $event_datetimes->first();
        return view('event.page')
            ->with('user',$user)
            ->with('event',$event)
            ->with('event_datetime',$event_datetime)
            ->with('path',$path);
    }
}
