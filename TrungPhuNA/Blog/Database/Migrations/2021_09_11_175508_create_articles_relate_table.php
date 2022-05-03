<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesRelateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_relate', function (Blueprint $table) {
            $table->id();
            $table->integer('ar_article_id')->index()->default(0);
            $table->integer('ar_relate_id')->index()->default(0);
            $table->tinyInteger('ar_sort')->default(0);
            $table->unique(['ar_article_id','ar_relate_id']);
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
        Schema::dropIfExists('articles_relate');
    }
}
