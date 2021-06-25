<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('active')->default(false);
            $table->string('firebase_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_translations', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id');
            $table->text('about')->nullable();
            $table->string('locale')->index();
            $table->unique(['user_id', 'locale']);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_translations');
        Schema::dropIfExists('users');
    }
}
