<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order',
        'amount',
        'months',
        'user_id',
        'status'
    ];
}
