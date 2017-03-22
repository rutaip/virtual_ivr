<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePsRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ps_registrations', function(Blueprint $table)
		{
			$table->string('id', 40)->index('ps_registrations_id');
			$table->enum('auth_rejection_permanent', array('yes','no'))->nullable();
			$table->string('client_uri')->nullable();
			$table->string('contact_user', 40)->nullable();
			$table->integer('expiration')->nullable();
			$table->integer('max_retries')->nullable();
			$table->string('outbound_auth', 40)->nullable();
			$table->string('outbound_proxy', 40)->nullable();
			$table->integer('retry_interval')->nullable();
			$table->integer('forbidden_retry_interval')->nullable();
			$table->string('server_uri')->nullable();
			$table->string('transport', 40)->nullable();
			$table->enum('support_path', array('yes','no'))->nullable();
			$table->integer('fatal_retry_interval')->nullable();
			$table->enum('line', array('yes','no'))->nullable();
			$table->string('endpoint', 40)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ps_registrations');
	}

}
