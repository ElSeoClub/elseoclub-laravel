<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->text('comentarios_apertura');
            $table->unsignedBigInteger('usuario_apertura_id');
            $table->text('comentarios_cierre')->nullable();
            $table->unsignedBigInteger('usuario_cierre_id')->nullable();
            $table->dateTime('fecha');
            $table->text('action');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('usuario_apertura_id')->references('id')->on('users');
            $table->foreign('usuario_cierre_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
