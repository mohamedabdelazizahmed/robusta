<?php

namespace App\Http\Controllers\Api;

use App\Models\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AvailableSeatsCollection;

class AvailableSeatAPIController extends Controller
{
    public function index(Request $request)
    {

        return new AvailableSeatsCollection(Seat::getAvailableSeats($request->tripId, $request->busId));
    }
}
