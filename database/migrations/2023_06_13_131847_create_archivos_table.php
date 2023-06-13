<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asunto_id');
            $table->unsignedBigInteger('actuacion_id')->nullable();
            $table->string('name');
            $table->string('path');
            $table->string('extension');
            $table->timestamps();
            $table->foreign('asunto_id')->references('id')->on('asuntos');
            $table->foreign('actuacion_id')->references('id')->on('actuacions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('archivos');
    }
}
