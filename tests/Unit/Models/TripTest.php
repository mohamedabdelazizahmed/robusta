<?php

namespace Tests\Unit\Models;

use App\Models\Bus;
use App\Models\Station;
use App\Models\Trip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TripTest extends TestCase
{
    use RefreshDatabase;

    public function testStartStation()
    {
        $startStation = Station::factory()->create();
        $trip = Trip::factory()->create([
            'start_station_id' => $startStation->id,
        ]);

        $tripStartStation = $trip->startStation;

        $this->assertEquals($startStation->id, $tripStartStation->id);
    }

    public function testEndStation()
    {
        $endStation = Station::factory()->create();
        $trip = Trip::factory()->create([
            'end_station_id' => $endStation->id,
        ]);

        $tripEndStation = $trip->endStation;

        $this->assertEquals($endStation->id, $tripEndStation->id);
    }

    public function testBus()
    {
        $trip = Trip::factory()->create();
        $bus = Bus::factory()->create([
            'trip_id' => $trip->id,
        ]);

        $tripBus = $trip->bus;

        $this->assertEquals($bus->id, $tripBus->id);
    }
}