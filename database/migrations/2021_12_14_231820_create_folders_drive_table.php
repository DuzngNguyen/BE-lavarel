<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoldersDriveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders_drive', function (Blueprint $table) {
            $table->id();
            $table->string('folder_id')->nullable();
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->char('type',20)->nullable();
            $table->string('size')->nullable();
            $table->string('basename')->nullable();
            $table->string('dirname')->nullable();
            $table->string('mimetype')->nullable();
            $table->string('extension')->nullable();
            $table->integer('parent_id')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folders_drive');
    }
}
