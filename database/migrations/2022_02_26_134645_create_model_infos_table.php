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
            $table->string("size")->nullable();
            $table->string("weight")->nullable();
            $table->string("engine")->nullable();
            $table->string("wattage")->nullable();
            $table->string("engine_shutdown_function")->nullable(); // co tieng anh
            $table->string("car_gearbox")->nullable();
            $table->string("fuel_consumption")->nullable();
            $table->string("lamp")->nullable();
            $table->string("automatic_lights")->nullable();
            $table->string("alluminum_alloy_lazang")->nullable();
            $table->string("exhaust_pipe")->nullable();
            $table->string("seat")->nullable();
            $table->string("central_screen")->nullable();
            $table->string("air_conditioning")->nullable();
            $table->string("front_wheel_brake")->nullable();
            $table->string("rear_wheel_brake")->nullable();
            $table->string("image")->nullable();
            $table->string("gif")->nullable();
            $table->string('active')->default('inactive'); // if value is active => available on website
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
