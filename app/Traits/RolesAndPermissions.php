<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait RolesAndPermissions
{
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role_name)
    {
        $role_o = Role::where("name", $role_name)->get();

        return $this->roles()->sync($role_o, false);
    }

    public function detachRole($role_name)
    {
        $role_o = Role::where("name", $role_name)->get();

        return $this->roles()->detach($role_o, false);
    }

    public function hasRoles(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains("name", $role)) {
                return true;
            }
        }
        return false;
    }

    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->pluck("name")->unique();
    }


    public function hasPermissions(...$permissions)
    {
        foreach ($permissions as $permission) {
            if ($this->permissions()->contains($permission)) {
                return true;
            }
        }
        return false;
    }
}
