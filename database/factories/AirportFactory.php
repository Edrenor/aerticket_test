<?php

namespace Database\Factories;

use App\Models\Airport;
use App\Models\TimeZone;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Airport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => strtoupper(Str::random(3)),
            'name' => $this->faker->city,
            'timezone_id' => TimeZone::pluck('id')[$this->faker->numberBetween(1, TimeZone::count() - 1)],
        ];
    }
}
