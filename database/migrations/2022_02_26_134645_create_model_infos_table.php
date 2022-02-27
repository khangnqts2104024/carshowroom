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
            $table->string('car_type');//xe diện,xe xang
            // thêm feild vào
            $table->unsignedBigInteger('price');
            $table->string('color');
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
