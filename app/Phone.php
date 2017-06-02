<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{

    protected $fillable = [
        'phone', 'label', 'user_id', 'company_id',
    ];
}
