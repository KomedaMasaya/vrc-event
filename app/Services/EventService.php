<?php
namespace App\Services;

use App\Models\Event;
use App\Models\Event_DateTime;

class EventService
{
     public function getEvents()
    {
        return $events = Event::orderBy('created_at', 'desc')->get();

       
    }

    public function checkOwnEvent(int $userId, int $eventId):bool
    {
        $event = Event::where('id', $eventId)->first();
        if(!$event) {
            return false;
        }
        return $event->user_id === $userId;
    }

    
}