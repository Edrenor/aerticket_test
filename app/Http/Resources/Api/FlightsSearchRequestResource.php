<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class FlightsSearchRequestResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "departureAirport" => $this['departureAirport'],
            "arrivalAirport"   => $this['arrivalAirport'],
            "departureDate"    => $this['departureDate'],
        ];
    }
}
