<?php

namespace TrungPhuNA\Admin\Http\Controllers\Acl;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use TrungPhuNA\Acl\Services\PermissionService;
use TrungPhuNA\Admin\Http\Requests\AdminPermissionRequest;
use TrungPhuNA\Admin\Http\Requests\AdminRoleRequest;

class AdminPermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderByDesc('group_permission')
            ->paginate(20);

        $viewData = [
            'permissions' => $permissions
        ];

        return view('admin::pages.acl.permission.index', $viewData);
    }

    public function create()
    {
        $groupPermission = PermissionService::getGroupPermission();

        return view('admin::pages.acl.permission.create', compact('groupPermission'));
    }

    public function store(AdminPermissionRequest $request)
    {
        try {

            $data       = $request->except('_token');
            $permission = Permission::create($data);

            return redirect()->route('get_admin.permission.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $groupPermission = PermissionService::getGroupPermission();
        $permission      = Permission::find($id);

        $viewData = [
            'permission'      => $permission,
            'groupPermission' => $groupPermission
        ];

        return view('admin::pages.acl.permission.update', $viewData);
    }

    public function getLoadPermission(Request $request)
    {
        if ($request->ajax()) {
            $permissions     = Permission::all();
            $permissions     = PermissionService::mapPermission($permissions);
            $groupPermission = PermissionService::getGroupPermission();

            if ($idOrder = $request->orderID) {
                $role               = Role::findOrFail($idOrder);
                $permissions_active = $role->permissions()->pluck('id')->toArray();
            }

            $viewData = [
                'permissions'        => $permissions,
                'groupPermission'    => $groupPermission,
                'permissions_active' => $permissions_active ?? []
            ];

            $permissionsHtml = view('admin::pages.acl.include._inc_list_permission', $viewData)->render();
            return response()->json([
                'html' => $permissionsHtml
            ]);
        }
    }

    public function update(AdminPermissionRequest $request, $id)
    {
        try {

            $data       = $request->except('_token');
            $permission = Permission::find($id)->update($data);

            return redirect()->route('get_admin.permission.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();

    }

    public function delete($id)
    {
        Permission::find($id)->delete();
        \DB::table('model_has_permissions')->where('permission_id', $id)->delete();
    }
}
