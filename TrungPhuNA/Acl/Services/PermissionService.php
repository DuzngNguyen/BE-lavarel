<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/27/21 .
 * Time: 2:43 PM .
 */

namespace TrungPhuNA\Acl\Services;


class PermissionService
{
    public static function getGroupPermission()
    {
        return  config('acl.permission_config.group');
    }

    public static function mapPermission($permissions)
    {
        $data   = [];
        $arrKey = [];
        foreach ($permissions as $permission) {
            if (!in_array($permission->group_permission, $arrKey)) {
                $arrKey[] = $permission->group_permission;
            }

            $data[$permission->group_permission][] = $permission;
        }

        return $data;
    }

    public static function syncRolePermission($role, $permissions)
    {
        if(!empty($permissions))
        {
            foreach ($permissions as $permission)
                $role->givePermissionTo($permission);
        }
    }

    public static function removePermissionInRole($role, $permissions)
    {
        foreach ($permissions as $p) {
            $role->revokePermissionTo($p); //Remove all permissions associated with role
        }
    }
}
