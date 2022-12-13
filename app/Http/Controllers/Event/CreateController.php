<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Event\CreateRequest;
use App\Models\Event;
use App\Models\Event_Datetime;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        $event = new Event;

        $event->title = $request->event_title();
        $event->description = $request->event_description();
        $supported = $request->supported_devices();

        if($supported==0){
            $event->support_pc=1;
            $event->support_quest=1;
        } elseif($supported==1){
            $event->support_pc=1;
            $event->support_quest=0;
        }else{
            $event->support_pc=0;
            $event->support_quest=1;
        }
        if($event->save()){
            $eventId = $event->id;
        }
        $event_datetime = new Event_Datetime;
        $event_datetime->event_id = $eventId;
        $event_datetime->Start_Date = $request->event_start_date();
        $event_datetime->End_Date = $request->event_end_date();
        $event_datetime->save();
        

        return redirect()->route('event.create');
    }
}
