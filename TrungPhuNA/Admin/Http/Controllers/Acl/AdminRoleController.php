<?php

namespace TrungPhuNA\Admin\Http\Controllers\Acl;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use TrungPhuNA\Acl\Services\PermissionService;
use TrungPhuNA\Admin\Http\Requests\AdminRoleRequest;

class AdminRoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'roles' => $roles
        ];

        return view('admin::pages.acl.role.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.acl.role.create');
    }

    public function store(AdminRoleRequest $request)
    {
        try {

            $data             = $request->except('_token');
            $role            = Role::create($data);
            if($request->permissions)
                PermissionService::syncRolePermission($role, $request->permissions);

            return redirect()->route('get_admin.role.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $role    = Role::find($id);
        $viewData = [
            'role' => $role
        ];

        return view('admin::pages.acl.role.update', $viewData);
    }

    public function update(AdminRoleRequest $request, $id)
    {
        try {

            $data  = $request->except('_token');
            $role = Role::find($id);
            $role->fill($data)->save();
            if($request->permissions)
            {
                PermissionService::removePermissionInRole($role, Permission::all());
                PermissionService::syncRolePermission($role, $request->permissions);
            }

            return redirect()->route('get_admin.role.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();

    }

    public function delete($id)
    {

    }
}
