<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIaxfriendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('iaxfriends', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 40)->index('iaxfriends_name');
			$table->enum('type', array('friend','user','peer'))->nullable();
			$table->string('username', 40)->nullable();
			$table->string('mailbox', 40)->nullable();
			$table->string('secret', 40)->nullable();
			$table->string('dbsecret', 40)->nullable();
			$table->string('context', 40)->nullable();
			$table->string('regcontext', 40)->nullable();
			$table->string('host', 40)->nullable();
			$table->string('ipaddr', 40)->nullable();
			$table->integer('port')->nullable();
			$table->string('defaultip', 20)->nullable();
			$table->string('sourceaddress', 20)->nullable();
			$table->string('mask', 20)->nullable();
			$table->string('regexten', 40)->nullable();
			$table->integer('regseconds')->nullable();
			$table->string('accountcode', 20)->nullable();
			$table->string('mohinterpret', 20)->nullable();
			$table->string('mohsuggest', 20)->nullable();
			$table->string('inkeys', 40)->nullable();
			$table->string('outkeys', 40)->nullable();
			$table->string('language', 10)->nullable();
			$table->string('callerid', 100)->nullable();
			$table->string('cid_number', 40)->nullable();
			$table->enum('sendani', array('yes','no'))->nullable();
			$table->string('fullname', 40)->nullable();
			$table->enum('trunk', array('yes','no'))->nullable();
			$table->string('auth', 20)->nullable();
			$table->integer('maxauthreq')->nullable();
			$table->enum('requirecalltoken', array('yes','no','auto'))->nullable();
			$table->enum('encryption', array('yes','no','aes128'))->nullable();
			$table->enum('transfer', array('yes','no','mediaonly'))->nullable();
			$table->enum('jitterbuffer', array('yes','no'))->nullable();
			$table->enum('forcejitterbuffer', array('yes','no'))->nullable();
			$table->string('disallow', 200)->nullable();
			$table->string('allow', 200)->nullable();
			$table->string('codecpriority', 40)->nullable();
			$table->string('qualify', 10)->nullable();
			$table->enum('qualifysmoothing', array('yes','no'))->nullable();
			$table->string('qualifyfreqok', 10)->nullable();
			$table->string('qualifyfreqnotok', 10)->nullable();
			$table->string('timezone', 20)->nullable();
			$table->enum('adsi', array('yes','no'))->nullable();
			$table->string('amaflags', 20)->nullable();
			$table->string('setvar', 200)->nullable();
			$table->index(['name','host'], 'iaxfriends_name_host');
			$table->index(['name','ipaddr','port'], 'iaxfriends_name_ipaddr_port');
			$table->index(['ipaddr','port'], 'iaxfriends_ipaddr_port');
			$table->index(['host','port'], 'iaxfriends_host_port');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('iaxfriends');
	}

}
