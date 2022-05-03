<?php

namespace TrungPhuNA\User\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use TrungPhuNA\User\Http\Requests\UserLoginRequest;

class UserLoginController extends Controller
{
    public function getLogin()
    {
        return view('user::auth.login');
    }

    public function postLogin(UserLoginRequest $request)
    {
        $credentials = $request->except('_token');
        if (\Auth::guard('users')->attempt($credentials)) {
            return redirect()->route('user_get.index');
        }

        return  redirect()->back();
    }
}
