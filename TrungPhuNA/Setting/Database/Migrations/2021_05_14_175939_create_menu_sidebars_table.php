<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuSidebarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_sidebars', function (Blueprint $table) {
            $table->id();
            $table->string('m_name')->nullable();
            $table->string('m_icon')->nullable();
            $table->string('m_link')->nullable();
            $table->string('m_route')->nullable();
            $table->string('m_prefix')->nullable();
            $table->string('m_permission')->nullable();
            $table->text('m_sub_menu')->nullable();
            $table->tinyInteger('m_sub_flag')->default(0);
            $table->tinyInteger('m_sort')->default(1);
            $table->tinyInteger('m_status')->default(2);
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
        Schema::dropIfExists('menu_sidebars');
    }
}
