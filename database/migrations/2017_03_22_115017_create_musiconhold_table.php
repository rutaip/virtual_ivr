<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMusiconholdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('musiconhold', function(Blueprint $table)
		{
			$table->string('name', 80)->primary();
			$table->enum('mode', array('custom','files','mp3nb','quietmp3nb','quietmp3'))->nullable();
			$table->string('directory')->nullable();
			$table->string('application')->nullable();
			$table->string('digit', 1)->nullable();
			$table->string('sort', 10)->nullable();
			$table->string('format', 10)->nullable();
			$table->dateTime('stamp')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('musiconhold');
	}

}
