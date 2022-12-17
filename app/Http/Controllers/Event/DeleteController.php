<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Event_DateTime;
use App\Services\EventService;
use Symfony\Component\HttpKernel\Exception\AccessdeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, EventService $eventService)
    {   
        
        $eventId = (int) $request->route('eventId');
        if (!$eventService->checkOwnEvent($request->user()->id,$eventId)) {
            throw new AccessDeniedHttpException();
        }
        $event = Event::where('id',$eventId)->firstOrFail();
        $event->event_datetimes()->delete();
        $event->delete();
        return redirect()
            ->route('event.index')
            ->with('feedback.success',"イベントを削除しました");
    }
}
