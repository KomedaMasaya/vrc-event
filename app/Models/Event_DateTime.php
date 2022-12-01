<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Event_DateTime;

class Event_DateTime extends Model
{
    use HasFactory;

    protected $table = 'event_datetimes';
    public $timestamps = false;
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
