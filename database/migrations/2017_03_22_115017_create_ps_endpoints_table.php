<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePsEndpointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ps_endpoints', function(Blueprint $table)
		{
			$table->string('id', 40)->index('ps_endpoints_id');
			$table->string('transport', 40)->nullable();
			$table->string('aors', 200)->nullable();
			$table->string('auth', 40)->nullable();
			$table->string('context', 40)->nullable();
			$table->string('disallow', 200)->nullable();
			$table->string('allow', 200)->nullable();
			$table->enum('direct_media', array('yes','no'))->nullable();
			$table->enum('connected_line_method', array('invite','reinvite','update'))->nullable();
			$table->enum('direct_media_method', array('invite','reinvite','update'))->nullable();
			$table->enum('direct_media_glare_mitigation', array('none','outgoing','incoming'))->nullable();
			$table->enum('disable_direct_media_on_nat', array('yes','no'))->nullable();
			$table->enum('dtmf_mode', array('rfc4733','inband','info','auto'))->nullable();
			$table->string('external_media_address', 40)->nullable();
			$table->enum('force_rport', array('yes','no'))->nullable();
			$table->enum('ice_support', array('yes','no'))->nullable();
			$table->enum('identify_by', array('username','auth_username'))->nullable();
			$table->string('mailboxes', 40)->nullable();
			$table->string('moh_suggest', 40)->nullable();
			$table->string('outbound_auth', 40)->nullable();
			$table->string('outbound_proxy', 40)->nullable();
			$table->enum('rewrite_contact', array('yes','no'))->nullable();
			$table->enum('rtp_ipv6', array('yes','no'))->nullable();
			$table->enum('rtp_symmetric', array('yes','no'))->nullable();
			$table->enum('send_diversion', array('yes','no'))->nullable();
			$table->enum('send_pai', array('yes','no'))->nullable();
			$table->enum('send_rpid', array('yes','no'))->nullable();
			$table->integer('timers_min_se')->nullable();
			$table->enum('timers', array('forced','no','required','yes'))->nullable();
			$table->integer('timers_sess_expires')->nullable();
			$table->string('callerid', 40)->nullable();
			$table->enum('callerid_privacy', array('allowed_not_screened','allowed_passed_screened','allowed_failed_screened','allowed','prohib_not_screened','prohib_passed_screened','prohib_failed_screened','prohib','unavailable'))->nullable();
			$table->string('callerid_tag', 40)->nullable();
			$table->enum('100rel', array('no','required','yes'))->nullable();
			$table->enum('aggregate_mwi', array('yes','no'))->nullable();
			$table->enum('trust_id_inbound', array('yes','no'))->nullable();
			$table->enum('trust_id_outbound', array('yes','no'))->nullable();
			$table->enum('use_ptime', array('yes','no'))->nullable();
			$table->enum('use_avpf', array('yes','no'))->nullable();
			$table->enum('media_encryption', array('no','sdes','dtls'))->nullable();
			$table->enum('inband_progress', array('yes','no'))->nullable();
			$table->string('call_group', 40)->nullable();
			$table->string('pickup_group', 40)->nullable();
			$table->string('named_call_group', 40)->nullable();
			$table->string('named_pickup_group', 40)->nullable();
			$table->integer('device_state_busy_at')->nullable();
			$table->enum('fax_detect', array('yes','no'))->nullable();
			$table->enum('t38_udptl', array('yes','no'))->nullable();
			$table->enum('t38_udptl_ec', array('none','fec','redundancy'))->nullable();
			$table->integer('t38_udptl_maxdatagram')->nullable();
			$table->enum('t38_udptl_nat', array('yes','no'))->nullable();
			$table->enum('t38_udptl_ipv6', array('yes','no'))->nullable();
			$table->string('tone_zone', 40)->nullable();
			$table->string('language', 40)->nullable();
			$table->enum('one_touch_recording', array('yes','no'))->nullable();
			$table->string('record_on_feature', 40)->nullable();
			$table->string('record_off_feature', 40)->nullable();
			$table->string('rtp_engine', 40)->nullable();
			$table->enum('allow_transfer', array('yes','no'))->nullable();
			$table->enum('allow_subscribe', array('yes','no'))->nullable();
			$table->string('sdp_owner', 40)->nullable();
			$table->string('sdp_session', 40)->nullable();
			$table->string('tos_audio', 10)->nullable();
			$table->string('tos_video', 10)->nullable();
			$table->integer('sub_min_expiry')->nullable();
			$table->string('from_domain', 40)->nullable();
			$table->string('from_user', 40)->nullable();
			$table->string('mwi_from_user', 40)->nullable();
			$table->string('dtls_verify', 40)->nullable();
			$table->string('dtls_rekey', 40)->nullable();
			$table->string('dtls_cert_file', 200)->nullable();
			$table->string('dtls_private_key', 200)->nullable();
			$table->string('dtls_cipher', 200)->nullable();
			$table->string('dtls_ca_file', 200)->nullable();
			$table->string('dtls_ca_path', 200)->nullable();
			$table->enum('dtls_setup', array('active','passive','actpass'))->nullable();
			$table->enum('srtp_tag_32', array('yes','no'))->nullable();
			$table->string('media_address', 40)->nullable();
			$table->enum('redirect_method', array('user','uri_core','uri_pjsip'))->nullable();
			$table->text('set_var', 65535)->nullable();
			$table->integer('cos_audio')->nullable();
			$table->integer('cos_video')->nullable();
			$table->string('message_context', 40)->nullable();
			$table->enum('force_avp', array('yes','no'))->nullable();
			$table->enum('media_use_received_transport', array('yes','no'))->nullable();
			$table->string('accountcode', 20)->nullable();
			$table->enum('media_encryption_optimistic', array('yes','no'))->nullable();
			$table->enum('user_eq_phone', array('yes','no'))->nullable();
			$table->enum('rpid_immediate', array('yes','no'))->nullable();
			$table->enum('g726_non_standard', array('yes','no'))->nullable();
			$table->integer('rtp_keepalive')->nullable();
			$table->integer('rtp_timeout')->nullable();
			$table->integer('rtp_timeout_hold')->nullable();
			$table->enum('bind_rtp_to_media_address', array('yes','no'))->nullable();
			$table->string('voicemail_extension', 40)->nullable();
			$table->integer('mwi_subscribe_replaces_unsolicited')->nullable();
			$table->string('deny', 95)->nullable();
			$table->string('permit', 95)->nullable();
			$table->string('acl', 40)->nullable();
			$table->string('contact_deny', 95)->nullable();
			$table->string('contact_permit', 95)->nullable();
			$table->string('contact_acl', 40)->nullable();
			$table->string('subscribe_context', 40)->nullable();
			$table->integer('fax_detect_timeout')->nullable();
			$table->string('contact_user', 80)->nullable();
			$table->enum('asymmetric_rtp_codec', array('yes','no'))->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ps_endpoints');
	}

}
