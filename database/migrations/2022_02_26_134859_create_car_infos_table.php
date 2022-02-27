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
        Schema::create('car_infos', function (Blueprint $table) {
            $table->string('car_id');
            $table->string('car_model');
            $table->foreign('car_model')->references('model_id')->on('model_infos');
            $table->unsignedBigInteger('car_branch');
            $table->foreign('car_branch')->references('id')->on('showrooms');
            $table->string('car_status');
            $table->string('order_id');
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->date('manufactoring_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_infos');
    }
};
