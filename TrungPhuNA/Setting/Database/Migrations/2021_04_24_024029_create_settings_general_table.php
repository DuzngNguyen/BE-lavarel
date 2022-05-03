<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_general', function (Blueprint $table) {
            $table->id();
            $table->string('sg_name')->nullable();
            $table->string('sg_email')->nullable();
            $table->string('sg_email_support')->nullable();
            $table->string('sg_address')->nullable();
            $table->string('sg_phone')->nullable();
            $table->text('sg_meta')->nullable();
            $table->string('sg_name_business')->nullable()->comment('Giấy phép kinh doanh');
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
        Schema::dropIfExists('settings_general');
    }
}
