<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs_request', function (Blueprint $table) {
            $table->id();
            $table->string('url', 300)->nullable();
            $table->string('method', 50)->nullable();
            $table->text('request_body')->nullable();
            $table->string('ip', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->text('auth')->nullable();
            $table->float('duration', 5)->default(0);
            $table->text('meta')->nullable();
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
        Schema::dropIfExists('logs_request');
    }
}
