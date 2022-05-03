<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('pp_product_id')->default(0)->index();
            $table->integer('pp_price')->default(0);
            $table->string('pp_name')->nullable();
            $table->tinyInteger('pp_sort')->default(1);
            $table->tinyInteger('pp_status')->default(1);
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
        Schema::dropIfExists('products_prices');
    }
}
