<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
        });
        
        Schema::create('station_translations', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('station_id');
            $table->string('name')->nullable();
            $table->string('locale')->index();
            $table->unique(['station_id', 'locale']);
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('station_translations');
        Schema::dropIfExists('stations');
    }
}
