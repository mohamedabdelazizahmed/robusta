<?php
namespace Tests\Unit\Models;

use App\Models\Bus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BusTest extends TestCase
{
    use RefreshDatabase;

    public function testCheckAvailableSeats()
    {
        $bus = Bus::factory()->create(['available_seats' => 10]);

        $this->assertFalse($bus->checkAvailableSeats());

        $bus = Bus::factory()->create(['available_seats' => 0]);

        $this->assertTrue($bus->checkAvailableSeats());
    }

    public function testDecreaseAvailableSeats()
    {
        $bus = Bus::factory()->create(['available_seats' => 5]);

        $bus->decreaseAvailableSeats();

        $this->assertEquals(4, $bus->available_seats);
    }

    public function testIncreaseAvailableSeats()
    {
        $bus = Bus::factory()->create(['available_seats' => 5]);

        $bus->increaseAvailableSeats();

        $this->assertEquals(6, $bus->available_seats);
    }
}