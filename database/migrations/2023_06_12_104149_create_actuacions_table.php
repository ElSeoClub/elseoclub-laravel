<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActuacionsTable extends Migration
{
        public function up()
        {
        Schema::create('actuacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asunto_id');
            $table->text('comentarios_apertura');
            $table->unsignedBigInteger('usuario_apertura_id');
            $table->text('comentarios_cierre')->nullable();
            $table->unsignedBigInteger('usuario_cierre_id')->nullable();
            $table->dateTime('fecha');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('asunto_id')->references('id')->on('asuntos');
            $table->foreign('usuario_apertura_id')->references('id')->on('users');
            $table->foreign('usuario_cierre_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('actuacions');
    }
}
