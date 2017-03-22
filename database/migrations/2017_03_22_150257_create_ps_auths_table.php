<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePsAuthsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ps_auths', function(Blueprint $table)
		{
			$table->string('id', 40)->index('ps_auths_id');
			$table->enum('auth_type', array('md5','userpass'))->nullable();
			$table->integer('nonce_lifetime')->nullable();
			$table->string('md5_cred', 40)->nullable();
			$table->string('password', 80)->nullable();
			$table->string('realm', 40)->nullable();
			$table->string('username', 40)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ps_auths');
	}

}
