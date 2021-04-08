<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightsSearchResponseResource extends JsonResource
{
    public function toArray($request): array
    {
        $localDepartureDateTime = Carbon::parse($this->departure_date_time)
            ->setTimezone($this->departureAirport->timezone->name)
            ->format('Y-m-d H:i:s');
        $localArrivalDateTime   = Carbon::parse($this->arrival_date_time)->setTimezone($this->arrivalAirport->timezone->name)->format('Y-m-d H:i:s');

        return [
            "transporter"       => new TransporterResource($this->transporter),
            "flightNumber"      => $this->flight_number,
            "departureAirport"  => $this->departureAirport->code,
            "arrivalAirport"    => $this->arrivalAirport->code,
            "departureDateTime" => $localDepartureDateTime,
            "arrivalDateTime"   => $localArrivalDateTime,
            "duration"          => $this->duration,
        ];
    }
}
