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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('model_id')->on('model_infos')->onUpdate('cascade')->onDelete('cascade');;
            $table->unsignedBigInteger('repo_id');
            $table->foreign('repo_id')->references('id')->on('warehouses')->onUpdate('cascade')->onDelete('cascade');;
            $table->unsignedInteger('quantity');
            $table->unique(['model_id','repo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};
