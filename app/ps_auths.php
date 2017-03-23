<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ps_auths extends Model
{
    protected $fillable = [
        'id', 'auth_type', 'password', 'username'
    ];

    public $timestamps = false;


}
