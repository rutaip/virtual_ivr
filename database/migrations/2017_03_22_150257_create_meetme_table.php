<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMeetmeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meetme', function(Blueprint $table)
		{
			$table->integer('bookid', true);
			$table->string('confno', 80);
			$table->dateTime('starttime')->nullable();
			$table->dateTime('endtime')->nullable();
			$table->string('pin', 20)->nullable();
			$table->string('adminpin', 20)->nullable();
			$table->string('opts', 20)->nullable();
			$table->string('adminopts', 20)->nullable();
			$table->string('recordingfilename', 80)->nullable();
			$table->string('recordingformat', 10)->nullable();
			$table->integer('maxusers')->nullable();
			$table->integer('members');
			$table->index(['confno','starttime','endtime'], 'meetme_confno_start_end');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meetme');
	}

}
