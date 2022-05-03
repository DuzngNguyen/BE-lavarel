<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 6/16/21 .
 * Time: 12:24 AM .
 */

namespace TrungPhuNA\Admin\Services;


use Spatie\Permission\Models\Role;
use TrungPhuNA\Setting\Entities\Admin;

class PermissionService
{
    public $admin = null;
    public function __construct()
    {
    }

    private function getPermissions()
    {
        if ($this->admin === null)
        {
            $roles = Admin::findOrFail(get_data_user('admins'))->roles->pluck('id')->toArray();
            $permissions = [];
            foreach($roles as $role)
            {
                $checkPermission = Role::find($role)->permissions()->pluck('name')->toArray();
                $permissions = array_merge( $permissions, $checkPermission);
            }

            $this->admin = $permissions;
        }

        return $this->admin;
    }

    /**
     *
     * @param string|array $permissions
     * @return bool
     */
    public function can($permissions = '')
    {
        if (is_string($permissions))
        {
            $permissions = explode('|', $permissions);
        }

        // list permission đang có
        $myPermissions = self::getPermissions();
        $isTrue = false;
//        dump($permissions);
//        dump($myPermissions);
        if ($permissions)
        {
            foreach($permissions as $permission)
            {
                if( in_array($permission, $myPermissions)) $isTrue = true;
//                $checkPermission = false;
//                foreach (explode('|',$permission) as $perm)
//                {
//                    if(in_array($perm, $myPermissions) || in_array('full', $myPermissions))
//                    {
//                        $checkPermission = true;
//                        break;
//                    }
//                }

//                if (!$checkPermission) $isTrue = false;
            }
        }

        return $isTrue ? true : false;
    }
}
