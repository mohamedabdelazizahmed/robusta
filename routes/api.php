<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthAPIController;
use App\Http\Controllers\Api\UserAPIController;
use App\Http\Controllers\Api\BusArrivedController;
use App\Http\Controllers\Api\BookSeatAPIController;
use App\Http\Controllers\Api\AvailableSeatAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/register', [AuthAPIController::class, 'createUser']);
Route::post('/auth/login', [AuthAPIController::class, 'loginUser']);


Route::group(['middleware' => 'auth:sanctum' ,'prefix'=>'v1','as'=>'api.'], function () {
    Route::get('users', [UserAPIController::class,'index']);
    Route::post('/seats/book', [BookSeatAPIController::class, 'store']);
    Route::get('/seats/available/{tripId?}/{BusId?}', [AvailableSeatAPIController::class, 'index']);
    Route::post('/bus/arrived-station', [BusArrivedController::class, 'store']);
});
