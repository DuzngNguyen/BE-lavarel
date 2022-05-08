<?php

namespace TrungPhuNA\Api\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Api\HelpersClass\ResponseService;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->except('_token');
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
