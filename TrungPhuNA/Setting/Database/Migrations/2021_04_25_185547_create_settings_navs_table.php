<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_navs', function (Blueprint $table) {
            $table->id();
            $table->string('sn_name')->nullable();
            $table->string('sn_url')->nullable();
            $table->char('sn_icon',15)->nullable();
            $table->char('sn_rel',15)->nullable();
            $table->tinyInteger('sn_status')->nullable();
            $table->tinyInteger('sn_type')->nullable()->comment('url, menu, article, product, tag');
            $table->integer('sn_id')->default(0)->comment('Menu, keyword, article, product, tag');
            $table->integer('sn_parent_id')->default(0)->index();
            $table->tinyInteger('sn_sort')->default(0);
            $table->tinyInteger('sb_is_child')->default(0);
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
        Schema::dropIfExists('settings_navs');
    }
}
