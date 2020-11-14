<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    public function assignPermission(...$permission_names)
    {
        foreach ($permission_names as $permission_name) {

            $permission_o = Permission::where("name", $permission_name)->get();

            $this->permissions()->sync($permission_o, false);
        }
        return;
    }

    public function detachPermission($permission_name)
    {

        $permission_o = Permission::where("name", $permission_name)->get();

        return $this->permissions()->detach($permission_o);
    }
}
