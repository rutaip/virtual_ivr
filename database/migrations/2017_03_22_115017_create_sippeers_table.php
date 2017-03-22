<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSippeersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sippeers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 40)->index('sippeers_name');
			$table->string('ipaddr', 45)->nullable();
			$table->integer('port')->nullable();
			$table->integer('regseconds')->nullable();
			$table->string('defaultuser', 40)->nullable();
			$table->string('fullcontact', 80)->nullable();
			$table->string('regserver', 20)->nullable();
			$table->string('useragent')->nullable();
			$table->integer('lastms')->nullable();
			$table->string('host', 40)->nullable();
			$table->enum('type', array('friend','user','peer'))->nullable();
			$table->string('context', 40)->nullable();
			$table->string('permit', 95)->nullable();
			$table->string('deny', 95)->nullable();
			$table->string('secret', 40)->nullable();
			$table->string('md5secret', 40)->nullable();
			$table->string('remotesecret', 40)->nullable();
			$table->enum('transport', array('udp','tcp','tls','ws','wss','udp,tcp','tcp,udp'))->nullable();
			$table->enum('dtmfmode', array('rfc2833','info','shortinfo','inband','auto'))->nullable();
			$table->enum('directmedia', array('yes','no','nonat','update','outgoing'))->nullable();
			$table->string('nat', 29)->nullable();
			$table->string('callgroup', 40)->nullable();
			$table->string('pickupgroup', 40)->nullable();
			$table->string('language', 40)->nullable();
			$table->string('disallow', 200)->nullable();
			$table->string('allow', 200)->nullable();
			$table->string('insecure', 40)->nullable();
			$table->enum('trustrpid', array('yes','no'))->nullable();
			$table->enum('progressinband', array('yes','no','never'))->nullable();
			$table->enum('promiscredir', array('yes','no'))->nullable();
			$table->enum('useclientcode', array('yes','no'))->nullable();
			$table->string('accountcode', 40)->nullable();
			$table->string('setvar', 200)->nullable();
			$table->string('callerid', 40)->nullable();
			$table->string('amaflags', 40)->nullable();
			$table->enum('callcounter', array('yes','no'))->nullable();
			$table->integer('busylevel')->nullable();
			$table->enum('allowoverlap', array('yes','no'))->nullable();
			$table->enum('allowsubscribe', array('yes','no'))->nullable();
			$table->enum('videosupport', array('yes','no'))->nullable();
			$table->integer('maxcallbitrate')->nullable();
			$table->enum('rfc2833compensate', array('yes','no'))->nullable();
			$table->string('mailbox', 40)->nullable();
			$table->enum('session-timers', array('accept','refuse','originate'))->nullable();
			$table->integer('session-expires')->nullable();
			$table->integer('session-minse')->nullable();
			$table->enum('session-refresher', array('uac','uas'))->nullable();
			$table->string('t38pt_usertpsource', 40)->nullable();
			$table->string('regexten', 40)->nullable();
			$table->string('fromdomain', 40)->nullable();
			$table->string('fromuser', 40)->nullable();
			$table->string('qualify', 40)->nullable();
			$table->string('defaultip', 45)->nullable();
			$table->integer('rtptimeout')->nullable();
			$table->integer('rtpholdtimeout')->nullable();
			$table->enum('sendrpid', array('yes','no'))->nullable();
			$table->string('outboundproxy', 40)->nullable();
			$table->string('callbackextension', 40)->nullable();
			$table->integer('timert1')->nullable();
			$table->integer('timerb')->nullable();
			$table->integer('qualifyfreq')->nullable();
			$table->enum('constantssrc', array('yes','no'))->nullable();
			$table->string('contactpermit', 95)->nullable();
			$table->string('contactdeny', 95)->nullable();
			$table->enum('usereqphone', array('yes','no'))->nullable();
			$table->enum('textsupport', array('yes','no'))->nullable();
			$table->enum('faxdetect', array('yes','no'))->nullable();
			$table->enum('buggymwi', array('yes','no'))->nullable();
			$table->string('auth', 40)->nullable();
			$table->string('fullname', 40)->nullable();
			$table->string('trunkname', 40)->nullable();
			$table->string('cid_number', 40)->nullable();
			$table->enum('callingpres', array('allowed_not_screened','allowed_passed_screen','allowed_failed_screen','allowed','prohib_not_screened','prohib_passed_screen','prohib_failed_screen','prohib'))->nullable();
			$table->string('mohinterpret', 40)->nullable();
			$table->string('mohsuggest', 40)->nullable();
			$table->string('parkinglot', 40)->nullable();
			$table->enum('hasvoicemail', array('yes','no'))->nullable();
			$table->enum('subscribemwi', array('yes','no'))->nullable();
			$table->string('vmexten', 40)->nullable();
			$table->enum('autoframing', array('yes','no'))->nullable();
			$table->integer('rtpkeepalive')->nullable();
			$table->integer('call-limit')->nullable();
			$table->enum('g726nonstandard', array('yes','no'))->nullable();
			$table->enum('ignoresdpversion', array('yes','no'))->nullable();
			$table->enum('allowtransfer', array('yes','no'))->nullable();
			$table->enum('dynamic', array('yes','no'))->nullable();
			$table->string('path', 256)->nullable();
			$table->enum('supportpath', array('yes','no'))->nullable();
			$table->index(['name','host'], 'sippeers_name_host');
			$table->index(['ipaddr','port'], 'sippeers_ipaddr_port');
			$table->index(['host','port'], 'sippeers_host_port');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sippeers');
	}

}
