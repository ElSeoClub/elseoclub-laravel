<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('location_id');
            $table->string('name');
            $table->string('short_name');
            $table->unsignedInteger('si');
            $table->unsignedInteger('no');
            $table->unsignedInteger('nulo');
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
