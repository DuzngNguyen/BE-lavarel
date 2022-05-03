<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pro_name')->nullable();
            $table->string('pro_code')->index();
            $table->string('pro_slug')->index()->unique();
            $table->integer('pro_price')->default(0);
            $table->integer('pro_price_children')->default(0);
            $table->integer('pro_category_id')->default(0);
            $table->integer('pro_admin_id')->default(0);
            $table->tinyInteger('pro_sale')->default(0);
            $table->string('pro_avatar')->nullable();
            $table->integer('pro_view')->default(0);
            $table->tinyInteger('pro_hot')->index()->default(0);
            $table->tinyInteger('pro_active')->index()->default(1);
            $table->integer('pro_pay')->default(0);
            $table->integer('pro_variable_total')->default(0);
            $table->mediumText('pro_description')->nullable();
            $table->text('pro_content')->nullable();
            $table->date('pro_expiry')->nullable();
            $table->integer('pro_review_total')->default(0);
            $table->integer('pro_review_star')->default(0);
            $table->integer('pro_age_review')->default(0);
            $table->integer('pro_number')->default(0);
            $table->string('pro_title_seo')->nullable();
            $table->string('pro_keyword_seo')->nullable();
            $table->string('pro_description_seo',300)->nullable();
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
        Schema::dropIfExists('products');
    }
}
