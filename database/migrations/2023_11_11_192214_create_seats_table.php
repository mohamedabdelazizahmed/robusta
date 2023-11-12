<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_booked')->default(false);
            $table->foreignId('trip_id')->constrained();  //CAIRO - ALEXANDRIA
            $table->foreignId('bus_id')->constrained(); // BUS-I  - 12
            $table->foreignId('user_id')->constrained();  // loggedIN - or -any user 
            $table->unsignedBigInteger('end_station_id');
            $table->foreign('end_station_id')->references('id')->on('stations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
