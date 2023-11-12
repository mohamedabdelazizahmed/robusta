<?php

namespace Database\Factories;

use App\Models\Station;
use App\Models\Trip;
use App\Models\Bus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
 */
class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'is_booked'=> false,
            'trip_id' => Trip::factory()->create()->id,
            'bus_id' => Bus::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'end_station_id' => Station::factory()->create()->id,
        ];
    
    }
}
