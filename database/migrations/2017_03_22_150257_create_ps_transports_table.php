<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePsTransportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ps_transports', function(Blueprint $table)
		{
			$table->string('id', 40)->index('ps_transports_id');
			$table->integer('async_operations')->nullable();
			$table->string('bind', 40)->nullable();
			$table->string('ca_list_file', 200)->nullable();
			$table->string('cert_file', 200)->nullable();
			$table->string('cipher', 200)->nullable();
			$table->string('domain', 40)->nullable();
			$table->string('external_media_address', 40)->nullable();
			$table->string('external_signaling_address', 40)->nullable();
			$table->integer('external_signaling_port')->nullable();
			$table->enum('method', array('default','unspecified','tlsv1','sslv2','sslv3','sslv23'))->nullable();
			$table->string('local_net', 40)->nullable();
			$table->string('password', 40)->nullable();
			$table->string('priv_key_file', 200)->nullable();
			$table->enum('protocol', array('udp','tcp','tls','ws','wss'))->nullable();
			$table->enum('require_client_cert', array('yes','no'))->nullable();
			$table->enum('verify_client', array('yes','no'))->nullable();
			$table->enum('verify_server', array('yes','no'))->nullable();
			$table->string('tos', 10)->nullable();
			$table->integer('cos')->nullable();
			$table->enum('allow_reload', array('yes','no'))->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ps_transports');
	}

}
