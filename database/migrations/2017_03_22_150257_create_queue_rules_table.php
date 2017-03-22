<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQueueRulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('queue_rules', function(Blueprint $table)
		{
			$table->string('rule_name', 80);
			$table->string('time', 32);
			$table->string('min_penalty', 32);
			$table->string('max_penalty', 32);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('queue_rules');
	}

}
