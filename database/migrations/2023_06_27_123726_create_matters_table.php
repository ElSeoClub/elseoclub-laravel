<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMattersTable extends Migration
{
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->text('task_types')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matters');
    }
}
