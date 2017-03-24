<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country_name');
            $table->string('country_iso');
            $table->string('city_name')->index();
            $table->string('city_prefix')->index();
            $table->string('city_id');
            $table->string('did_number');
            $table->string('did_status')->index();
            $table->string('did_timeleft');
            $table->string('did_expire_date_gmt');
            $table->string('order_id');
            $table->string('order_status')->index();
            $table->string('did_mapping_format');
            $table->string('did_setup');
            $table->string('did_monthly');
            $table->string('did_period');
            $table->string('autorenew_enable')->index();
            $table->string('prepaid_balance');
            $table->string('user_id')->index();
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
        Schema::dropIfExists('dids');
    }
}
