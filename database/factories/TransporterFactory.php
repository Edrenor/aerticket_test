<?php

namespace Database\Factories;

use App\Models\Transporter;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransporterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transporter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(5),
            'name' => $this->faker->word,
        ];
    }
}
