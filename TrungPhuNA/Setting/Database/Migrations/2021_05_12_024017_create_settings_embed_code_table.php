<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsEmbedCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_embed_code', function (Blueprint $table) {
            $table->id();
            $table->string('s_name')->nullable();
            $table->tinyInteger('s_type')->default(1);
            $table->tinyInteger('s_position')->default(1);
            $table->text('s_content')->nullable();
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
        Schema::dropIfExists('settings_embed_code');
    }
}
