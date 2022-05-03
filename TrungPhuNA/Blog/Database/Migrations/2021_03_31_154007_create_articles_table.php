<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('a_name')->nullable();
            $table->string('a_slug')->index()->unique();
            $table->integer('a_price')->default(0);
            $table->integer('a_menu_id')->default(0);
            $table->integer('a_admin_id')->default(0);
            $table->tinyInteger('a_sale')->default(0);
            $table->string('a_avatar')->nullable();
            $table->integer('a_view')->default(0);
            $table->tinyInteger('a_hot')->index()->default(0);
            $table->tinyInteger('a_active')->index()->default(1);
            $table->mediumText('a_description')->nullable();
            $table->text('a_content')->nullable();
            $table->integer('a_review_total')->default(0);
            $table->integer('a_review_star')->default(0);
            $table->integer('a_age_review')->default(0);
            $table->string('a_title_seo')->nullable();
            $table->string('a_keyword_seo')->nullable();
            $table->string('a_description_seo',300)->nullable();
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
        Schema::dropIfExists('articles');
    }
}
