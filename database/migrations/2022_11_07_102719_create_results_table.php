<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('votation_id');
            $table->unsignedBigInteger('location_id');
            $table->integer('favor')->default(0);
            $table->integer('contra')->default(0);
            $table->integer('nulos')->default(0);
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('votation_id')->references('id')->on('votations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
