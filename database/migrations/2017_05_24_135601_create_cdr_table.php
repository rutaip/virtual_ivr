<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdr', function (Blueprint $table) {
            $table->dateTime('calldate');
            $table->string('clid', 80)->default('');
            $table->string('src', 80)->default('');
            $table->string('dst', 80)->default('');
            $table->string('dcontext', 80)->default('');
            $table->string('channel', 80)->default('');
            $table->string('dstchannel', 80)->default('');
            $table->string('lastapp', 80)->default('');
            $table->string('lastdata', 80)->default('');
            $table->integer('duration')->default('0');
            $table->integer('billsec')->default('0');
            $table->string('disposition', 45)->default('');
            $table->integer('amaflags')->default('0');
            $table->string('accountcode', 20)->default('');
            $table->string('uniqueid', 32)->default('');
            $table->string('userfield', 255)->default('');
            $table->string('peeraccount', 20)->default('');
            $table->string('linkedid', 32)->default('');
            $table->integer('sequence')->default('0');
            $table->string('srcdid', 80)->default('');
            $table->string('dstdid', 80)->default('');
            $table->string('calltype', 80)->default('');
            $table->string('hangupcause', 80)->default('');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cdr');
    }
}
