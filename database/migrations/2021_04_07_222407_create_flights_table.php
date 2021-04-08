<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');
            $table->unsignedBigInteger('departure_airport_id');
            $table->unsignedBigInteger('arrival_airport_id');
            $table->unsignedBigInteger('transporter_id');
            $table->dateTime('departure_date_time');
            $table->dateTime('arrival_date_time');

            $table->integer('duration');

            $table->timestamps();

            $table->foreign('departure_airport_id')
                ->on('airports')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('arrival_airport_id')
                ->on('airports')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('transporter_id')
                ->on('transporters')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
