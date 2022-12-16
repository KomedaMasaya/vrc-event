<?php

namespace App\Http\Controllers\Event\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Event\UpdateRequest;
use App\Models\Event;
use App\Models\Event_Datetime;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request)
    {
        $event = Event::where('id', $request->id())->firstOrFail();
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
        $event_datetime = Event_Datetime::where('event_id',$eventId)->firstOrFail();
        $event_datetime->event_id = $eventId;
        $event_datetime->Start_Date = $request->event_start_date();
        $event_datetime->End_Date = $request->event_end_date();
        $event_datetime->save();
        

        return redirect()
        ->route('event.update.index',['eventId'=>$event->id])
        ->with('feedback.success',"つぶやきを編集しました");
    }
}
