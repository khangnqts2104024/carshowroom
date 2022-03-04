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
        Schema::create('employee_infos', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('email')->unique();
            $table->string('fullname');
            $table->string('phone_number',11);
            $table->string('address');
            $table->unsignedBigInteger('salary')->nullable();
            $table->unsignedBigInteger('emp_branch');
            $table->foreign('emp_branch')->references('id')->on('showrooms')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('employee_infos');
    }
};
