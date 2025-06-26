<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddR2FieldsToFolderFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('folder_files', function (Blueprint $table) {
            $table->string('r2_path')->nullable()->after('path')->index();
            $table->boolean('r2_synced')->default(false)->after('r2_path')->index();
            $table->timestamp('r2_synced_at')->nullable()->after('r2_synced');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('folder_files', function (Blueprint $table) {
            $table->dropColumn(['r2_path', 'r2_synced', 'r2_synced_at']);
        });
    }
}
