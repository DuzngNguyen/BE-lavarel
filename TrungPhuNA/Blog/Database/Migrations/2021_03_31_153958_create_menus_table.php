<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('m_name');
            $table->string('m_slug')->unique();
            $table->string('m_avatar')->nullable();
            $table->string('m_banner')->nullable();
            $table->string('m_description')->nullable();
            $table->integer('m_parent_id')->default(0)->index();
            $table->tinyInteger('m_hot')->default(0);
            $table->tinyInteger('m_status')->default(1);
            $table->string('m_title_seo')->nullable();
            $table->string('m_description_seo')->nullable();
            $table->string('m_keyword_seo')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
