<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('o_transaction_id')->default(0)->index();
            $table->integer('o_action_id')->default(0);
            $table->tinyInteger('o_sale')->default(0);
            $table->integer('o_price')->default(0);
            $table->integer('o_total_price')->default(0);
            $table->integer('o_qty')->default(0);
            $table->tinyInteger('o_status')->default(1);
            $table->integer('o_admin_id')->default(0);
            $table->integer('o_user_id')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
