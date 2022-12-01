<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Event_DateTime;

class Event extends Model
{
    use HasFactory;

    public function event_datetimes()
    {
        return $this->hasMany(Event_DateTime::class);
    }
}
