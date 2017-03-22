<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePsContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ps_contacts', function(Blueprint $table)
		{
			$table->string('id')->nullable()->index('ps_contacts_id');
			$table->string('uri')->nullable();
			$table->bigInteger('expiration_time')->nullable();
			$table->integer('qualify_frequency')->nullable();
			$table->string('outbound_proxy', 40)->nullable();
			$table->text('path', 65535)->nullable();
			$table->string('user_agent')->nullable();
			$table->float('qualify_timeout', 10, 0)->nullable();
			$table->string('reg_server', 20)->nullable();
			$table->enum('authenticate_qualify', array('yes','no'))->nullable();
			$table->string('via_addr', 40)->nullable();
			$table->integer('via_port')->nullable();
			$table->string('call_id')->nullable();
			$table->string('endpoint', 40)->nullable();
			$table->unique(['id','reg_server'], 'ps_contacts_uq');
			$table->index(['qualify_frequency','expiration_time'], 'ps_contacts_qualifyfreq_exp');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ps_contacts');
	}

}
