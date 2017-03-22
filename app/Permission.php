<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'label',
        'description'

    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
