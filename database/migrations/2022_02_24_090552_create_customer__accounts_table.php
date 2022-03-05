<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customer_infos')->onUpdate('cascade')->onDelete('cascade');    
            $table->string('email')->unique();

            // $table->foreign('email')->references('email')->on('customer_infos')->onUpdate('cascade')->onDelete('cascade');    

 
            $table->string('google_id')->nullable();  

            $table->timestamp('email_verified_at');
            $table->string('password',70);
            $table->rememberToken();
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
        Schema::dropIfExists('customer_accounts');
    }

    
};
