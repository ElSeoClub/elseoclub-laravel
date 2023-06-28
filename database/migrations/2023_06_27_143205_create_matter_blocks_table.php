<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatterBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matter_blocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matter_id');
            $table->text('column_1')->nullable();
            $table->text('column_2')->nullable();
            $table->text('column_3')->nullable();
            $table->integer('position');
            $table->string('status')->default('draft');
            $table->timestamps();
            $table->foreign('matter_id')->references('id')->on('matters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matter_blocks');
    }
}
