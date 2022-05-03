<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->id();
            $table->string('k_name')->nullable();
            $table->string('k_slug')->unique();
            $table->string('k_description')->nullable();
            $table->tinyInteger('k_sort')->default(0);
            $table->tinyInteger('k_status')->default(1);
            $table->tinyInteger('k_hot')->default(0);
            $table->tinyInteger('k_type')->default(1);
            $table->string('k_avatar')->nullable();
            $table->string('k_title_seo')->nullable();
            $table->string('k_keyword_seo')->nullable();
            $table->string('k_description_seo')->nullable();
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
        Schema::dropIfExists('keywords');
    }
}
