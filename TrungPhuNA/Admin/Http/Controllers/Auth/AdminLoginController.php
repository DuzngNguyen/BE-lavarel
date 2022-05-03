<?php

namespace TrungPhuNA\Admin\Http\Controllers\Auth;

use App\Jobs\JobForgetPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use TrungPhuNA\Admin\Http\Requests\AdminLoginRequest;
use TrungPhuNA\Setting\Entities\Admin;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin::pages.auth.login');
    }

    public function login(AdminLoginRequest $request)
    {
        $account     = $request->account;
        $password    = $request->password;

        $credentials = [
            'account'  => $account,
            'password' => $password
        ];

        if (filter_var($account, FILTER_VALIDATE_EMAIL)) {
            $credentials = [
                'email'    => $account,
                'password' => $password
            ];
        }

        if (\Auth::guard('admins')->attempt($credentials)) {
            return redirect()->route('get_admin.index');
        }

        return redirect()->back();
    }

    public function logout()
    {
        \Auth::guard('admins')->logout();
        return redirect()->route('get_admin.login');
    }

    public function forgetPassword()
    {
        return view('admin::pages.auth.forget_password');
    }

    public function processForgetPassword(Request $request)
    {
        $email = $request->email;
        $admin = Admin::where('email', $email)->first();
        if (!$admin)
        {
            return redirect()->back()->with('error','Tài khoản không tồn tại');
        }

        // Check xem đã gủi reset lần nào chưa
        $checkResets =  DB::table('password_resets')->where('email', $email)->first();
        if ($checkResets) {
            return redirect()->back()->with('error','Xin vui lòng kiểm tra email của bạn');
        }

        $token = md5(Hash::make($email . Carbon::now()));
        $resets = DB::table('password_resets')->insert([
            'email' => $email,
            'created_at' => Carbon::now(),
            'token' => $token
        ]);

        dispatch(new JobForgetPassword($admin, $token));

        return redirect()->back()->with('success','Xin vui lòng kiểm tra email và điền mật khẩu mới');

        // 1 ngày chỉ tối đa 3 lần
    }

    public function verificationPassword(Request $request)
    {
        $email = $request->email;
        $token = $request->token;

        if ($email && $token)
        {
            $resets = DB::table('password_resets')->where([
                'email' => $email,
                'token' => $token
            ])->first();

            if (!$resets)   return redirect()->route('get_admin.forget_password')->with('error','Không tồn tại dữ liệu trong hệ thống');

            // Xử lý time ở đây
            return view('admin::pages.auth.resets_password');
        }

        return redirect()->route('get_admin.forget_password')->with('error','Không tồn tại dữ liệu trong hệ thống');
    }

    public function processVerificationPassword(Request $request)
    {
        $email = $request->email;
        $token = $request->token;

        if ($email && $token)
        {
            $resets = DB::table('password_resets')->where([
                'email' => $email,
                'token' => $token
            ])->first();

            if (!$resets)   return redirect()->route('get_admin.forget_password')->with('error','Không tồn tại dữ liệu trong hệ thống');

            $password = $request->password;
            $admin = Admin::where('email', $email)->first();
            if (!$admin)
            {
                return redirect()->route('get_admin.forget_password')->with('error','Không tồn tại tài khoản');
            }

            $admin->password = Hash::make($password);
            $admin->save();
            return  redirect()->route('get_admin.login')->with('success','Cập nhật mật khẩu thành công!');
            // Xử lý time ở đây
        }

        return redirect()->route('get_admin.forget_password')->with('error','Không tồn tại dữ liệu trong hệ thống');
    }
}
