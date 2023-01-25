<?php

namespace App\Http\Controllers\Event\Create;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Event\CreateRequest;
use App\Models\Event;
use App\Models\Event_Datetime;
use App\Models\Image;
use App\Services\EventService;
use Illuminate\Support\Facades\Storage;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request, EventService $eventService)
    {
        $event = new Event;
        $event->user_id = $request->userId();
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


        $image = $request->image();
        Storage::disk('dropbox')->put('',$image);
        $imageModel = new Image();
        $imageModel->name = $image->hashName();
        $imageModel->save();
        $event->images()->attach($imageModel->id);

        return redirect()->route('event.index');
    }
}
