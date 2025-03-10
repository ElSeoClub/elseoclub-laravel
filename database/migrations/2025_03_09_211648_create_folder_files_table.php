<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolderFilesTable extends Migration
{
    public function up()
    {
        Schema::create('folder_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('folder_id')->constrained('folders')->onDelete('cascade');
            $table->string('name');
            $table->text('path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('folder_files');
    }
}
