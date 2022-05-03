<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('t_name')->nullable();
            $table->string('t_slug')->unique();
            $table->string('t_description')->nullable();
            $table->tinyInteger('t_sort')->default(0);
            $table->tinyInteger('t_status')->default(1);
            $table->tinyInteger('t_hot')->default(0);
            $table->tinyInteger('t_type')->default(1);
            $table->string('t_avatar')->nullable();
            $table->string('t_title_seo')->nullable();
            $table->string('t_keyword_seo')->nullable();
            $table->string('t_description_seo')->nullable();
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
        Schema::dropIfExists('tags');
    }
}
