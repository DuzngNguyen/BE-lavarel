<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsSlideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_slide', function (Blueprint $table) {
            $table->id();
            $table->string('s_name')->nullable();
            $table->string('s_link')->nullable();
            $table->string('s_banner')->nullable();
            $table->tinyInteger('s_target')->default(1);
            $table->tinyInteger('s_sort')->default(1);
            $table->tinyInteger('s_status')->default(1);
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
        Schema::dropIfExists('settings_slide');
    }
}
