<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'label',
        'description'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo($permission)
    {
        return $this->permissions()->save(
            Permission::whereName($permission)->firstOrFail()
        );
    }

    public function deletePermissionTo($permission)
    {
        return $this->permissions()->save(
            Permission::whereName($permission)->firstOrFail()
        );
    }
}
