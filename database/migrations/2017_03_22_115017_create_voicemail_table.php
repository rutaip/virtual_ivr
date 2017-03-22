<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoicemailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('voicemail', function(Blueprint $table)
		{
			$table->integer('uniqueid', true);
			$table->string('context', 80)->index('voicemail_context');
			$table->string('mailbox', 80)->index('voicemail_mailbox');
			$table->string('password', 80);
			$table->string('fullname', 80)->nullable();
			$table->string('alias', 80)->nullable();
			$table->string('email', 80)->nullable();
			$table->string('pager', 80)->nullable();
			$table->enum('attach', array('yes','no'))->nullable();
			$table->string('attachfmt', 10)->nullable();
			$table->string('serveremail', 80)->nullable();
			$table->string('language', 20)->nullable();
			$table->string('tz', 30)->nullable();
			$table->enum('deletevoicemail', array('yes','no'))->nullable();
			$table->enum('saycid', array('yes','no'))->nullable();
			$table->enum('sendvoicemail', array('yes','no'))->nullable();
			$table->enum('review', array('yes','no'))->nullable();
			$table->enum('tempgreetwarn', array('yes','no'))->nullable();
			$table->enum('operator', array('yes','no'))->nullable();
			$table->enum('envelope', array('yes','no'))->nullable();
			$table->integer('sayduration')->nullable();
			$table->enum('forcename', array('yes','no'))->nullable();
			$table->enum('forcegreetings', array('yes','no'))->nullable();
			$table->string('callback', 80)->nullable();
			$table->string('dialout', 80)->nullable();
			$table->string('exitcontext', 80)->nullable();
			$table->integer('maxmsg')->nullable();
			$table->decimal('volgain', 5)->nullable();
			$table->string('imapuser', 80)->nullable()->index('voicemail_imapuser');
			$table->string('imappassword', 80)->nullable();
			$table->string('imapserver', 80)->nullable();
			$table->string('imapport', 8)->nullable();
			$table->string('imapflags', 80)->nullable();
			$table->dateTime('stamp')->nullable();
			$table->index(['mailbox','context'], 'voicemail_mailbox_context');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('voicemail');
	}

}
