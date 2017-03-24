<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDidWwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('did_ww', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country_name')->index();
            $table->string('country_prefix')->index();
            $table->string('country_iso')->index();
            $table->string('city_id');
            $table->string('city_name')->index();
            $table->string('city_prefix')->index();
            $table->string('city_nxx_prefix')->nullable();
            $table->string('setup');
            $table->string('monthly');
            $table->string('isavailable')->index();
            $table->string('islnrrequired');
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
        Schema::dropIfExists('did_ww');
    }
}
