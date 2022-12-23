<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EventService;
use App\Models\Event;
use App\Models\Event_DateTime;
use Illuminate\Support\Facades\Storage;

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
        //Storage::disk('dropbox')->put('example.txt', 'Contents');
        $path = Storage::disk('dropbox')->url('IMG_2264.jpg');
        $events = $eventService->getEvents();
        return view('event.index')
            ->with('events',$events)
            ->with('path',$path);
        
    }
}
