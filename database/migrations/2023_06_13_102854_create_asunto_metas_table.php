<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsuntoMetasTable extends Migration
{
    public function up()
    {
        Schema::create('asunto_metas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asunto_id');
            $table->string('meta_key')->index();
            $table->text('meta_value');
            $table->timestamps();
            $table->foreign('asunto_id')->references('id')->on('asuntos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asunto_metas');
    }
}
