<?php

namespace App\Http\Controllers\Api;

use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AvailableSeatsCollection;

class BusArrivedController extends Controller
{
    function store(Request $request)
    {
        $bus  = Bus::findOrFail($request->bus_id);
        $seats = Seat::where('end_station_id' ,$request->end_station_id)->get()
            ->map(function($seat) use ($bus) {
                $seat->setAvailableSeats($bus);
                return $seat;
            });
            
        return new AvailableSeatsCollection($seats);
        
    }
}
