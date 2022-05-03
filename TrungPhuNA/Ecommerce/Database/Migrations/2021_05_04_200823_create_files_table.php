<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('f_name',300)->nullable();
            $table->string('f_slug',300)->nullable();
            $table->string('f_path',300)->nullable();
            $table->string('f_link',300)->nullable();
            $table->string('f_ext',20)->default('docx');
            $table->string('f_hash_id',50)->index()->nullable();
            $table->timestamp('f_time_stop')->nullable();
            $table->integer('f_product_id')->default(0)->index();
            $table->text('f_meta')->nullable();
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
        Schema::dropIfExists('files');
    }
}
