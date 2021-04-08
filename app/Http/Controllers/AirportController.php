<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use App\Http\Resources\Api\AirportResource;

class AirportController extends Controller
{
    public function getAirports()
    {
        return AirportResource::collection(Airport::all());
    }
}
