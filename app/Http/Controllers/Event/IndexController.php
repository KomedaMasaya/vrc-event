<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EventService;
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
    public function __invoke(Request $request, EventService $eventService)
    {
        $user = $eventService->getUser();
        $events = $eventService->getEvents();
        return view('event.index')
            ->with('user',$user)
            ->with('events',$events);
            
            
        
    }
}
