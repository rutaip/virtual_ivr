<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePsDomainAliasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ps_domain_aliases', function(Blueprint $table)
		{
			$table->string('id', 40)->index('ps_domain_aliases_id');
			$table->string('domain', 80)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ps_domain_aliases');
	}

}
