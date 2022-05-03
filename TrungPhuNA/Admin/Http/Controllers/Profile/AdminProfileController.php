<?php

namespace TrungPhuNA\Admin\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use TrungPhuNA\Admin\Http\Requests\AdminRequestUpdatePasswordProfile;
use TrungPhuNA\Admin\Http\Requests\AdminRequestUpdateProfile;
use TrungPhuNA\Setting\Entities\Admin;

class AdminProfileController extends Controller
{
    public function index()
    {
        $id = get_data_user('admins');
        $admin = Admin::find($id);

        $viewData = [
            'admin' => $admin
        ];

        return view('admin::pages.profile.index', $viewData);
    }

    public function update(AdminRequestUpdateProfile $request, $id)
    {
        $data = $request->except('_token','avatar');
        if ($request->avatar) {
            $image = upload_image('avatar');
            if ($image['code'] == 1)
                $data['avatar'] = $image['name'];
        }

        \DB::table('admins')->where('id',get_data_user('admins'))
            ->update($data);

        return redirect()->back();
    }

    public function getUpdatePassword(Request $request)
    {
        $id = get_data_user('admins');
        $admin = Admin::find($id);

        $viewData = [
            'admin' => $admin
        ];

        return view('admin::pages.profile.password', $viewData);
    }

    public function postUpdatePassword(AdminRequestUpdatePasswordProfile $request)
    {
        $password = Hash::make($request->password);
        Admin::where('id', get_data_user('admins'))
            ->update([
                'password' => $password
            ]);

        \Auth::guard('admins')->logout();
        return redirect()->route('get_admin.login');

    }

}
