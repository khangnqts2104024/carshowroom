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
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('model_id')->on('model_infos')->onUpdate('cascade')->onDelete('cascade');;
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('order_id')->on('orders')->onUpdate('cascade')->onDelete('cascade');;
            $table->unsignedBigInteger('order_price');
            $table->unsignedBigInteger('emp_received');
            // $table->foreign('emp_received')->references('employee_id')->on('employee_infos');
            $table->string('order_status')->default('ordered');
            $table->primary(['model_id','order_id']);
            
            // thêm option
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
