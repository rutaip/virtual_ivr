<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ps_aors extends Model
{
    protected $fillable = [
        'id', 'max_contacts'
    ];

    public $timestamps = false;
}
