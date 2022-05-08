<?php

namespace TrungPhuNA\Api\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Api\HelpersClass\ResponseService;

class ApiRegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            $data             = $request->except('_token', 'password_confirmation');
            $data['password'] = Hash::make($request->password);
            $user             = User::create($data);
            if (!$user) {
                return response()->json(ResponseService::getError("Đăng ký thất bại"));
            }
            $credentials      = [
                'email'    => $request->email,
                'password' => $request->password
            ];

            if (!Auth::attempt($credentials)) {
                return response()->json(ResponseService::getError("Tài khoản không tồn tại"));
            }

            $accessToken = Auth::user()->createToken('authToken')->accessToken;

            $user    = Auth::user();

            $results = [
                'user'        => $user,
                'accessToken' => $accessToken
            ];

            return response()->json(ResponseService::getSuccess($results));
        } catch (\Exception $exception) {
            Log::error("API: " . $exception->getMessage());
            return response()->json(ResponseService::getError($exception->getMessage()));
        }
    }
}
