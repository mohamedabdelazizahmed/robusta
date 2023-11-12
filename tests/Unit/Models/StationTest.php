<?php
namespace Tests\Unit\Models;

use App\Models\Station;
use App\Models\Trip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StationTest extends TestCase
{
    use RefreshDatabase;

    public function testTripsFrom()
    {
        $station = Station::factory()->create();
        $trips = Trip::factory()->count(3)->create([
            'start_station_id' => $station->id,
        ]);

        $tripsFromStation = $station->tripsFrom;

        $this->assertCount($trips->count(), $tripsFromStation);
        foreach ($tripsFromStation as $trip) {
            $this->assertEquals($station->id, $trip->start_station_id);
        }
    }

    public function testTripsTo()
    {
        $station = Station::factory()->create();
        $trips = Trip::factory()->count(3)->create([
            'end_station_id' => $station->id,
        ]);

        $tripsToStation = $station->tripsTo;

        $this->assertCount($trips->count(), $tripsToStation);
        foreach ($tripsToStation as $trip) {
            $this->assertEquals($station->id, $trip->end_station_id);
        }
    }
}