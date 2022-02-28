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
            $table->string('model_id');
            $table->primary('model_id');
            $table->string('model_name',50);
            $table->string('car_type',50);
            $table->unsignedBigInteger('price');
            $table->string('color');
            // thêm feild vào
            $table->string("size",50);
            $table->string("weight",50);
            $table->string("engine",50);
            $table->string("wattage",50);
            $table->string("engine_shutdown_function",50);
            $table->string("car_gearbox",50);
            $table->string("fuel_consumption",50);
            $table->string("lamp",50);
            $table->string("automatic_lights",50);
            $table->string("alluminum_alloy_lazang",50);
            $table->string("exhaust_pipe",50);
            $table->string("seat",50);
            $table->string("central_screen",50);
            $table->string("air_conditioning",50);
            $table->string("front_wheel_brake",50);
            $table->string("rear_wheel_brake",50);
            $table->string("image");
            $table->string("gif");

           
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
