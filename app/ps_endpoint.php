<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ps_endpoint extends Model
{
    protected $fillable = [
        'id', 'transport', 'aors', 'auth', 'context', 'disallow', 'allow', 'direct_media'
    ];

    public $timestamps = false;

    public function ps_auth()
    {
        return $this->hasOne(ps_auths::class, 'id', 'auth');
    }

    public function ps_aor()
    {
        return $this->hasOne(ps_aors::class, 'id', 'aors');
    }

}
