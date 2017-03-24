<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DidWw extends Model
{
    protected $table = 'did_ww';

    protected $fillable = [
        'country_name',
        'country_prefix',
        'country_iso',
        'city_id',
        'city_name',
        'city_prefix',
        'city_nxx_prefix',
        'setup',
        'monthly',
        'isavailable',
        'islnrrequired',
    ];
}
