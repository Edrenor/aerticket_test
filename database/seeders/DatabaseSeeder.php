<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Flight;
use App\Models\Airport;
use App\Models\Transporter;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Airport::factory()->count(10)->create();
        Transporter::factory()->count(10)->create();
        Flight::factory()->count(500)->create();
    }
}
