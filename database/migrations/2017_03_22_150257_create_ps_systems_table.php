<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePsSystemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ps_systems', function(Blueprint $table)
		{
			$table->string('id', 40)->index('ps_systems_id');
			$table->integer('timer_t1')->nullable();
			$table->integer('timer_b')->nullable();
			$table->enum('compact_headers', array('yes','no'))->nullable();
			$table->integer('threadpool_initial_size')->nullable();
			$table->integer('threadpool_auto_increment')->nullable();
			$table->integer('threadpool_idle_timeout')->nullable();
			$table->integer('threadpool_max_size')->nullable();
			$table->enum('disable_tcp_switch', array('yes','no'))->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ps_systems');
	}

}
