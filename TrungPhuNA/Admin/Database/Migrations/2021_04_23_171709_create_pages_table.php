<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('url')->index()->unique();
            $table->string('description',300)->nullable();
            $table->integer('view')->default(0);
            $table->text('content');
            $table->integer('a_auth_id')->default(0);
            $table->char('seo',20)->nullable()->default("NOINDEX, NOFOLLOW");
            $table->string('title_seo')->nullable();
            $table->string('avatar')->nullable();
            $table->string('keyword_seo')->nullable();
            $table->string('description_seo',300)->nullable();
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
        Schema::dropIfExists('pages');
    }
}
