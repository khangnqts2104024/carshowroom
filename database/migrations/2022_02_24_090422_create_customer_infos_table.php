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
        Schema::create('customer_infos', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('email');
            $table->string('citizen_id')->nullable();
            $table->string('fullname')->nullable();
            $table->string('phone_number',11)->nullable();
            $table->string('address')->nullable();
            $table->string('customer_role',11)->nullable();// guest-member

            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_infos');
    }
};
