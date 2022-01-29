<?php


namespace Eskiell\FocusPermission\Traits;


use Eskiell\FocusPermission\Models\Permission;

trait HasPermission
{
    public function roles()
    {
        return $this->belongsToMany(
            config('focus-permission.models.role'),
            config('focus-permission.table_names.users_roles'),
        );

    }
    public function permissions()
    {
        return $this->belongsToMany(
            config('focus-permission.models.permission'),
            config('focus-permission.table_names.users_permissions'),
        );

    }
    public function hasRole(...$roles): bool
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }
    public function hasPermissionTo($permission): bool
    {
        return $this->hasPermissionThroughRole($permission);
    }
    private function hasPermissionThroughRole($permission): bool
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('name',$permission)) {
                return true;
            }
        }
        return false;
    }
}