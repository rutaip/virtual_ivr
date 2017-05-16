<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQueueMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('queue_members', function(Blueprint $table)
		{
			$table->string('queue_name', 80);
			$table->string('interface', 80);
			$table->string('membername', 80)->nullable();
			$table->string('state_interface', 80)->nullable();
			$table->integer('penalty')->nullable();
			$table->integer('paused')->nullable();
			$table->primary(['queue_name','interface']);
            $table->integer('uniqueid');
            $table->unique('uniqueid');
            $table->increments('uniqueid')->change();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('queue_members');
	}

}
