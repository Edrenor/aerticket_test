<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Flight;
use App\Models\Airport;
use Illuminate\Support\Str;
use App\Models\Transporter;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $duration          = rand(30, 24 * 60);
        $departureDateTime = Carbon::today()->addDays(rand(0, 14));
        $arrivalDateTime   = $departureDateTime->addMinutes($duration);

        return [
            'flight_number' => Str::random(6),
            'departure_airport_id' => Airport::all()->random()->id,
            'arrival_airport_id' => Airport::all()->random()->id,
            'transporter_id' => Transporter::all()->random()->id,
            'departure_date_time' => $departureDateTime,
            'arrival_date_time' => $arrivalDateTime,
            'duration' => $duration,
        ];
    }
}
