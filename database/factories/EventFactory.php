<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use HasFactory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->name(),
            'support_pc'=>$this->faker->boolean(50),
            'support_quest'=>$this->faker->boolean(50),
            'description' => $this->faker->realText(100),
            'created_at'=>$this->faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
            'updated_at'=>$this->faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
            
        ];
    }
}