<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/27/21 .
 * Time: 5:46 PM .
 */

namespace TrungPhuNA\Acl\Services;


use Spatie\Permission\Models\Role;

class RoleService
{
    public static function getRoles()
    {
        return Role::all();
    }

    /**
     * @param $admin
     * @param $roles
     */
    public static function syncAdminToRole($admin, $roles)
    {
        if(!empty($roles))
            foreach ($roles as $role)
                $admin->syncRoles($role);
    }


}
