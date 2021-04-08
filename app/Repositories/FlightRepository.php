<?php

namespace App\Repositories;

use App\Models\Flight;

class FlightRepository
{
    /**
     * @param int    $departureAirportId
     * @param int    $arrivalAirportId
     * @param string $departureDate
     *
     * @return array
     */
    public function search(int $departureAirportId, int $arrivalAirportId, string $departureDate): array
    {
        return Flight::with(['departureAirport', 'arrivalAirport'])
            ->where('departure_airport_id', $departureAirportId)
            ->where('arrival_airport_id', $arrivalAirportId)
            ->whereBetween(
                'departure_date_time',
                [$departureDate . ' 00:00:00', $departureDate . ' 23:59:59']
            )
            ->orderBy('departure_date_time')->get()->all();
    }
}
