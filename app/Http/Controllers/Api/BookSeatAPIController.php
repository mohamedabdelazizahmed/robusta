<?php

namespace App\Http\Controllers\Api;

use App\Models\Bus;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookSeatAPIController extends Controller
{
    function store(Request $request )
    {
        $trip = Trip::findOrFail($request->trip_id);
        $bus  = Bus::findOrFail($request->bus_id);
        $user = User::find($request->user_id);
        if ($bus->checkAvailableSeats()) {
            return response()->json(['message' => 'No available seats on this bus'], 400);
        }

        // create seats for this trip 
        $seat = Seat::bookSeatForTrip($trip ,$bus ,$user ,$request->end_station_id);
        return response()->json([
            'message' => 'Seat booked successfully has #'. $seat->id ,
            'available_seat' => $bus->available_seats,
        ]);

    }
}
