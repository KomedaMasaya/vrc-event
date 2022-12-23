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

    public function images()
    {
        return $this->belongsToMany(Image::class, 'event_images')->using(EventImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
