<?php 
namespace Tests\Unit\Models;

use App\Models\Bus;
use Tests\TestCase;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\User;
use App\Models\Station;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeatTest extends TestCase
{
    use RefreshDatabase;

    public function testBookSeatForTrip()
    {
        $station = Station::factory()->create();
        $trip = Trip::factory()->create();
        $bus = Bus::factory()->create();
        $user = User::factory()->create();
        $end_station_id = $station->id;

        $seat = Seat::bookSeatForTrip($trip, $bus, $user, $end_station_id);

        $this->assertTrue($seat->is_booked);
        $this->assertEquals($trip->id, $seat->trip_id);
        $this->assertEquals($bus->id, $seat->bus_id);
        $this->assertEquals($user->id, $seat->user_id);
    }

    public function testGetAvailableSeats()
    {
        $trip = Trip::factory()->create();
        $bus = Bus::factory()->create();
        $seats = Seat::factory()->count(5)->create([
            'trip_id' => $trip->id,
            'bus_id' => $bus->id,
            'is_booked' => false,
        ]);

        $availableSeats = Seat::getAvailableSeats($trip->id, $bus->id);

        $this->assertCount($seats->count(), $availableSeats);
        foreach ($availableSeats as $seat) {
            $this->assertFalse($seat->is_booked);
            $this->assertEquals($trip->id, $seat->trip_id);
            $this->assertEquals($bus->id, $seat->bus_id);
        }
    }
    public function testSetAvailableSeats()
    {
        $bus = Bus::factory()->create();
        $seat = Seat::factory()->create([
            'is_booked' => true,
            'bus_id' => $bus->id,
        ]);

        $seat->setAvailableSeats($bus);

        $this->assertFalse($seat->fresh()->is_booked);
    }

}