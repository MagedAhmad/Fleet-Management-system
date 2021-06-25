<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoppagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoppages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id');
            $table->foreignId('station_id');
            $table->integer('order');

            $table->foreign('trip_id')->references('id')->on('trips')->cascadeOnDelete();
            $table->foreign('station_id')->references('id')->on('stations')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stoppages');
    }
}
