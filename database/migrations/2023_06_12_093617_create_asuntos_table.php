<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsuntosTable extends Migration
{
    public function up()
    {
        Schema::create('asuntos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->string('expediente');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipo_id')->references('id')->on('tipos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asuntos');
    }
}
