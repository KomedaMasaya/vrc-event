<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use HasFactory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event_DateTime>
 */
class Event_DateTimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_id'=> 1,
            'Start_Date'=>$this->faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
            'End_Date'=>$this->faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
            
        ];
    }
}
