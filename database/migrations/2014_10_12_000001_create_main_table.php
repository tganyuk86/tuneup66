<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("measurement");
            $table->string("mileage");
            $table->string("volumeUsed");
            $table->string("distance");
            $table->string("monthlyFuelSpending");
            $table->string("monthlyDistance");
            $table->string("fuelPrice");
            $table->string("carYear");
            $table->string("carMake");
            $table->string("carModel");
            $table->string("firstName");
            $table->string("lastName");
            $table->string("email");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
