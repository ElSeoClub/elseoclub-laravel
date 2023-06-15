<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoToActuacionsTable extends Migration
{
    public function up()
    {
        Schema::table('actuacions', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_id')->after('asunto_id')->nullable();
            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    public function down()
    {
        Schema::table('actuacions', function (Blueprint $table) {
            $table->dropColumn('estado_id');
        });
    }
}
