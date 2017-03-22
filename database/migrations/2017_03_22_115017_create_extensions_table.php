<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtensionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('extensions', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('context', 40);
			$table->string('exten', 40);
			$table->integer('priority');
			$table->string('app', 40);
			$table->string('appdata', 256);
			$table->unique(['context','exten','priority'], 'context');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('extensions');
	}

}
