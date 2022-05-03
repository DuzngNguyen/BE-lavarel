<?php

namespace TrungPhuNA\Admin\Http\Controllers\Setting;

use App\Jobs\JobSendEmailCreateAccount;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Acl\Services\RoleService;
use TrungPhuNA\Admin\Http\Requests\AdminAccountRequest;
use TrungPhuNA\Setting\Entities\Admin;

class AdminAccountController extends Controller
{
    public function index()
    {
        $admins = Admin::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'admins' => $admins
        ];

        return view('admin::pages.setting.account.index', $viewData);
    }

    public function create()
    {
        $roles = RoleService::getRoles();
        return view('admin::pages.setting.account.create', compact('roles'));
    }

    public function store(AdminAccountRequest $request)
    {
        try {

            $data             = $request->except('_token');
            $data['password'] = Hash::make($request->password);
            $admin            = Admin::create($data);
            if ($roles = $request->roles)
                RoleService::syncAdminToRole($admin, $roles);

            dispatch(new JobSendEmailCreateAccount($admin));

            return redirect()->route('get_admin.account.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $admin       = Admin::find($id);
        $roles       = RoleService::getRoles();
        $rolesActive = $admin->roles()->pluck('id')->toArray();
        $viewData    = [
            'admin'       => $admin,
            'roles'       => $roles,
            'rolesActive' => $rolesActive ?? []
        ];

        return view('admin::pages.setting.account.update', $viewData);
    }

    public function update(AdminAccountRequest $request, $id)
    {
        try {

            $data = $request->except('_token','password');
            if ($request->password) $data['password'] = Hash::make($request->password);
            $admin = Admin::find($id);
            $admin->fill($data)->save();

            if ($roles = $request->roles) {
                $admin->roles()->sync($roles);
            } else {
                $admin->roles()->detach();
            }

            return redirect()->route('get_admin.account.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();

    }

    public function delete($id)
    {
        Admin::find($id)->delete();
        return redirect()->back();
    }
}
