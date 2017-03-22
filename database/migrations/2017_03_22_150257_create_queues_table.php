<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQueuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('queues', function(Blueprint $table)
		{
			$table->string('name', 128)->primary();
			$table->string('musiconhold', 128)->nullable();
			$table->string('announce', 128)->nullable();
			$table->string('context', 128)->nullable();
			$table->integer('timeout')->nullable();
			$table->enum('ringinuse', array('yes','no'))->nullable();
			$table->enum('setinterfacevar', array('yes','no'))->nullable();
			$table->enum('setqueuevar', array('yes','no'))->nullable();
			$table->enum('setqueueentryvar', array('yes','no'))->nullable();
			$table->string('monitor_format', 8)->nullable();
			$table->string('membermacro', 512)->nullable();
			$table->string('membergosub', 512)->nullable();
			$table->string('queue_youarenext', 128)->nullable();
			$table->string('queue_thereare', 128)->nullable();
			$table->string('queue_callswaiting', 128)->nullable();
			$table->string('queue_quantity1', 128)->nullable();
			$table->string('queue_quantity2', 128)->nullable();
			$table->string('queue_holdtime', 128)->nullable();
			$table->string('queue_minutes', 128)->nullable();
			$table->string('queue_minute', 128)->nullable();
			$table->string('queue_seconds', 128)->nullable();
			$table->string('queue_thankyou', 128)->nullable();
			$table->string('queue_callerannounce', 128)->nullable();
			$table->string('queue_reporthold', 128)->nullable();
			$table->integer('announce_frequency')->nullable();
			$table->enum('announce_to_first_user', array('yes','no'))->nullable();
			$table->integer('min_announce_frequency')->nullable();
			$table->integer('announce_round_seconds')->nullable();
			$table->string('announce_holdtime', 128)->nullable();
			$table->string('announce_position', 128)->nullable();
			$table->integer('announce_position_limit')->nullable();
			$table->string('periodic_announce', 50)->nullable();
			$table->integer('periodic_announce_frequency')->nullable();
			$table->enum('relative_periodic_announce', array('yes','no'))->nullable();
			$table->enum('random_periodic_announce', array('yes','no'))->nullable();
			$table->integer('retry')->nullable();
			$table->integer('wrapuptime')->nullable();
			$table->integer('penaltymemberslimit')->nullable();
			$table->enum('autofill', array('yes','no'))->nullable();
			$table->string('monitor_type', 128)->nullable();
			$table->enum('autopause', array('yes','no','all'))->nullable();
			$table->integer('autopausedelay')->nullable();
			$table->enum('autopausebusy', array('yes','no'))->nullable();
			$table->enum('autopauseunavail', array('yes','no'))->nullable();
			$table->integer('maxlen')->nullable();
			$table->integer('servicelevel')->nullable();
			$table->enum('strategy', array('ringall','leastrecent','fewestcalls','random','rrmemory','linear','wrandom','rrordered'))->nullable();
			$table->string('joinempty', 128)->nullable();
			$table->string('leavewhenempty', 128)->nullable();
			$table->enum('reportholdtime', array('yes','no'))->nullable();
			$table->integer('memberdelay')->nullable();
			$table->integer('weight')->nullable();
			$table->enum('timeoutrestart', array('yes','no'))->nullable();
			$table->string('defaultrule', 128)->nullable();
			$table->string('timeoutpriority', 128)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('queues');
	}

}
