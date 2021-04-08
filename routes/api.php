<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AirportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('search', [FlightController::class, 'search'])->name('search');
Route::get('airports', [AirportController::class, 'getAirports'])->name('getAirports');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
