<?php
namespace App\Services;

use App\Models\Event;
use App\Models\Event_DateTime;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EventService
{
     public function getEvents()
    {
        return $events = Event::orderBy('created_at', 'desc')->get();
    }

    public function getImages()
    {
        return $path = Storage::disk('dropbox')->url('IMG_2264.jpg');
    }

    public function getUser()
    {
        return $user = Auth::user();
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