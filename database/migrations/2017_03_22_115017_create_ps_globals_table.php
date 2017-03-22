<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePsGlobalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ps_globals', function(Blueprint $table)
		{
			$table->string('id', 40)->index('ps_globals_id');
			$table->integer('max_forwards')->nullable();
			$table->string('user_agent')->nullable();
			$table->string('default_outbound_endpoint', 40)->nullable();
			$table->string('debug', 40)->nullable();
			$table->string('endpoint_identifier_order', 40)->nullable();
			$table->integer('max_initial_qualify_time')->nullable();
			$table->string('default_from_user', 80)->nullable();
			$table->integer('keep_alive_interval')->nullable();
			$table->string('regcontext', 80)->nullable();
			$table->integer('contact_expiration_check_interval')->nullable();
			$table->string('default_voicemail_extension', 40)->nullable();
			$table->enum('disable_multi_domain', array('yes','no'))->nullable();
			$table->integer('unidentified_request_count')->nullable();
			$table->integer('unidentified_request_period')->nullable();
			$table->integer('unidentified_request_prune_interval')->nullable();
			$table->string('default_realm', 40)->nullable();
			$table->integer('mwi_tps_queue_high')->nullable();
			$table->integer('mwi_tps_queue_low')->nullable();
			$table->enum('mwi_disable_initial_unsolicited', array('yes','no'))->nullable();
			$table->enum('ignore_uri_user_options', array('yes','no'))->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ps_globals');
	}

}
