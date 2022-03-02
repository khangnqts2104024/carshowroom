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
        Schema::create('model_infos', function (Blueprint $table) {
            $table->id('model_id');
            $table->string('model_name',50);
            $table->string('car_type',50)->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->string('color')->nullable();
            // thêm feild vào
            $table->string("size",50)->nullable();
            $table->string("weight",50)->nullable();
            $table->string("engine",50)->nullable();
            $table->string("wattage",50)->nullable();
            $table->string("engine_shutdown_function",50)->nullable();
            $table->string("car_gearbox",50)->nullable();
            $table->string("fuel_consumption",50)->nullable();
            $table->string("lamp",50)->nullable();
            $table->string("automatic_lights",50)->nullable();
            $table->string("alluminum_alloy_lazang",50)->nullable();
            $table->string("exhaust_pipe",50)->nullable();
            $table->string("seat",50)->nullable();
            $table->string("central_screen",50)->nullable();
            $table->string("air_conditioning",50)->nullable();
            $table->string("front_wheel_brake",50)->nullable();
            $table->string("rear_wheel_brake",50)->nullable();
            $table->string("image")->nullable();
            $table->string("gif")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_infos');
    }
};
