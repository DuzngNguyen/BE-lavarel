<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_item', function (Blueprint $table) {
            $table->id();
            $table->string('pi_name')->nullable();
            $table->string('pi_slug')->nullable();
            $table->string('pi_description')->nullable();
            $table->integer('pi_product_id')->index()->default(0);
            $table->integer('pi_view')->default(0);
            $table->longText('pi_content')->nullable();
            $table->tinyInteger('pi_status')->default(1);
            $table->tinyInteger('pi_sort')->default(1);
            $table->string('pi_avatar')->default(0);
            $table->string('pi_link')->nullable();
            $table->text('pi_meta')->nullable();
            $table->string('pi_title_seo')->nullable();
            $table->string('pi_description_seo')->nullable();
            $table->string('pi_keyword_seo')->nullable();
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
        Schema::dropIfExists('products_item');
    }
}
