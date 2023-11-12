<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    function checkAvailableSeats() {
        return !! $this->available_seats <= 0;
    }

    function decreaseAvailableSeats(){
        $this->available_seats--;
        $this->save();
        return $this;
    }
    function increaseAvailableSeats(){
        $this->available_seats++;
        $this->save();
        return $this;
    }
}
