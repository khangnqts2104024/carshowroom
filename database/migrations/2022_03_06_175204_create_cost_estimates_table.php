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
        Schema::create('cost_estimates', function (Blueprint $table) {
            $table->id();
            $table->string('matp',5);
            $table->foreign('matp')->references('matp')->on('provinces')->onUpdate('cascade')->onDelete('cascade');    
            $table->unsignedBigInteger("Inspectionfee");
            $table->unsignedBigInteger("Licenseplatefee");
            $table->unsignedBigInteger("Roadusagefee");
            $table->unsignedBigInteger("Civilliabilityinsurance");
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
        Schema::dropIfExists('cost_estimates');
    }
};
