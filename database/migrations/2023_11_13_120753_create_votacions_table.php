<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'event_id' );
            $table->unsignedBigInteger( 'location_id' );
            $table->string( 'name' );
            //label 1 to 10
            $table->string( 'label_1' )->nullable();
            $table->unsignedInteger( 'value_1' )->default(0);
            $table->string( 'label_2' )->nullable();
            $table->unsignedInteger( 'value_2' )->default(0);
            $table->string( 'label_3' )->nullable();
            $table->unsignedInteger( 'value_3' )->default(0);
            $table->string( 'label_4' )->nullable();
            $table->unsignedInteger( 'value_4' )->default(0);
            $table->string( 'label_5' )->nullable();
            $table->unsignedInteger( 'value_5' )->default(0);
            $table->string( 'label_6' )->nullable();
            $table->unsignedInteger( 'value_6' )->default(0);
            $table->string( 'label_7' )->nullable();
            $table->unsignedInteger( 'value_7' )->default(0);
            $table->string( 'label_8' )->nullable();
            $table->unsignedInteger( 'value_8' )->default(0);
            $table->string( 'label_9' )->nullable();
            $table->unsignedInteger( 'value_9' )->default(0);
            $table->string( 'label_10' )->nullable();
            $table->unsignedInteger( 'value_10' )->default(0);
            $table->timestamps();
            $table->foreign( 'event_id' )->references( 'id' )->on( 'events' )->onDelete( 'cascade' );
            $table->foreign( 'location_id' )->references( 'id' )->on( 'locations' )->onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votacions');
    }
}
