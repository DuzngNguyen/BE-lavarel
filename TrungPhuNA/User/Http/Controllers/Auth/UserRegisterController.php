<?php

namespace TrungPhuNA\User\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\User\Http\Requests\UserRegisterRequest;

class UserRegisterController extends Controller
{
    public function getRegister(Request $request)
    {
        return view('user::auth.register');
    }

    public function postRegister(UserRegisterRequest $request)
    {
        try{
            $data             = $request->except('_token','password_confirmation');
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
            \Auth::guard('users')->login($user);
            return  redirect()->route('user_get.index');
        } catch (\Exception $exception)
        {
            Log::error("[Error: ] postRegister Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }
}
