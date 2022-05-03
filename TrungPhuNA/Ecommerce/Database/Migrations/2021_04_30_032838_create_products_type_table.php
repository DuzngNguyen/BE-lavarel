<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_type', function (Blueprint $table) {
            $table->id();
            $table->string('pt_name')->nullable();
            $table->string('pt_slug')->nullable();
            $table->string('pt_icon')->nullable();
            $table->string('pt_description',300)->nullable();
            $table->string('pt_avatar')->nullable();
            $table->string('pt_title_seo')->nullable();
            $table->string('pt_keyword_seo')->nullable();
            $table->string('pt_description_seo',300)->nullable();
            $table->tinyInteger('pi_status')->default(1);
            $table->tinyInteger('pi_sort')->default(1);
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
        Schema::dropIfExists('products_type');
    }
}
