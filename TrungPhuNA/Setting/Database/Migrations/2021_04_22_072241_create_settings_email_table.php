<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_email', function (Blueprint $table) {
            $table->id();
            $table->char('mail_driver',20)->nullable();
            $table->string('mail_host')->nullable();
            $table->char('mail_port',10)->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_from_address')->nullable();
            $table->string('mail_domain')->nullable();
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
        Schema::dropIfExists('settings_email');
    }
}
