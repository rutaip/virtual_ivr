<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Did extends Model
{
    protected $fillable = [
        'country_name',
        'country_iso',
        'city_name',
        'city_prefix',
        'city_id',
        'did_number',
        'did_status',
        'did_timeleft',
        'did_expire_date_gmt',
        'order_id',
        'order_status',
        'did_mapping_format',
        'did_setup',
        'did_monthly',
        'did_period',
        'autorenew_enable',
        'prepaid_balance',
        'user_id'
    ];
}
