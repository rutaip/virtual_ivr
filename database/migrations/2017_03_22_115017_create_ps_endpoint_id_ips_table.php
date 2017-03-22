<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePsEndpointIdIpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ps_endpoint_id_ips', function(Blueprint $table)
		{
			$table->string('id', 40)->index('ps_endpoint_id_ips_id');
			$table->string('endpoint', 40)->nullable();
			$table->string('match', 80)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ps_endpoint_id_ips');
	}

}
