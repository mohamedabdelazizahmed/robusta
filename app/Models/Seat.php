<?php

namespace App\Models;

use App\Models\Trip;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seat extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'is_booked' => 'boolean',
    ];
    public static function bookSeatForTrip($trip, $bus, $user, $end_station_id)
    {
        return DB::transaction(function () use ($trip, $bus, $user, $end_station_id) {
            $bus->decreaseAvailableSeats();
            return static::create([
                'is_booked' => true,
                'trip_id' => $trip->id,
                'bus_id' => $bus->id,
                'user_id' => $user->id,
                'end_station_id' => $end_station_id
            ]);
        });
    }
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public static function getAvailableSeats($tripId = null, $busId = null)
    {
        return static::whereIsBooked(false)
            ->when($tripId, function ($query) use ($tripId) {
                return $query->where('trip_id', $tripId);
            })
            ->when($busId, function ($query) use ($busId) {
                return $query->where('bus_id', $busId);
            })
            ->with(['trip.bus'])
            ->get();
    }

    public function  setAvailableSeats($bus){
        return DB::transaction(function () use ($bus) {
            $bus->increaseAvailableSeats();
            return static::update([
                'is_booked' => false,
            ]);
        });
    }
}
