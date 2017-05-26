<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'payment_method', 'amount', 'status', 'transaction_id', 'order_id'
    ];

    public function order(){
        return $this->hasOne(Order::class, 'order', 'order_id');
    }
}
