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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('momo_id')->nullable();
            $table->unsignedBigInteger('showroom');
            $table->string('order_code')->unique();
            $table->foreign('showroom')->references('id')->on('showrooms');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customer_infos')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('order_date');
            $table->string("note")->nullable();
            $table->string('cancel_code',10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
