<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimezonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('timezones', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('region')->nullable();
        });

        $regions = [
            'Africa'     => DateTimeZone::AFRICA,
            'America'    => DateTimeZone::AMERICA,
            'Antarctica' => DateTimeZone::ANTARCTICA,
            'Aisa'       => DateTimeZone::ASIA,
            'Atlantic'   => DateTimeZone::ATLANTIC,
            'Europe'     => DateTimeZone::EUROPE,
            'Indian'     => DateTimeZone::INDIAN,
            'Pacific'    => DateTimeZone::PACIFIC
        ];

        $timezones = collect()->push(['name' => 'UTC', 'region' => null]);

        foreach ($regions as $name => $mask) {
            foreach (DateTimeZone::listIdentifiers($mask) as $timezone) {
                $time   = new DateTime(null, new DateTimeZone($timezone));
                $offset = $time->format('P');

                if ($offset > 13) {
                    continue;
                }

                $timezones->push([
                    'name'   => $timezone,
                    'region' => $name,
                ]);
            }
        }

        DB::table('timezones')->insert($timezones->toArray());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('timezones');
    }
}
