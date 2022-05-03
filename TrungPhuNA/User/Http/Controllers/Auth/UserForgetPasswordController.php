<?php

namespace TrungPhuNA\User\Http\Controllers\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\User\Http\Requests\UserUpdatePasswordRequest;
use TrungPhuNA\User\Http\Requests\UserVerificationRequest;
use TrungPhuNA\User\Jobs\User\SendEmailRestartPasswordJob;

class UserForgetPasswordController extends Controller
{
    public function getForgetPassword(Request $request)
    {
        if ($request->token) return $this->processValidatorToken($request);

        return view('user::auth.forget_password');
    }

    public function getForgetPasswordSuccess()
    {
        return view('user::auth.forget_password_success');
    }

    public function processValidatorToken(Request $request)
    {
        $token = $request->token;
        $dbToken = $this->checkToken($token);
        if (!$dbToken) return abort(404);

        return redirect()->route('user_get.update_password',['token' => $dbToken->token]);
    }

    public function processVerification(UserVerificationRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                session()->flash('error', 'Email không tồn tại!');
                return redirect()->route('user_get.forget_password');
            }

            $isRestartPassword = \DB::table('password_resets')->where('email', $user->email)->first();
            if ($isRestartPassword) {
                return abort(401);
            }

            $token = md5($user->email) . ' ha linh cherry' . date("l jS \of F Y h:i:s A");
            $token = md5($token);

            $dbToken = \DB::table('password_resets')->insert([
                'email'      => $user->email,
                'token'      => $token,
                'created_at' => Carbon::now()
            ]);

            if ($dbToken)
            {
                $link = route('user_get.forget_password', ['token' => $token]);
                $viewData = [
                    'link' => $link,
                    'user' => $user
                ];

                dispatch(new SendEmailRestartPasswordJob($viewData));
            }

            return  redirect()->route('user_get.forget_password_success',['token' => $token]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }

        return redirect()->back();
    }

    public function getUpdatePassword(Request $request)
    {
        $token = $request->token;
        $dbToken = $this->checkToken($token);
        if (!$dbToken) return abort(404);
        $user = User::where('email', $dbToken->email)->first();
        if (!$user) return  abort(404);

        $viewData = [
            'user' => $user
        ];

        return view('user::auth.update_password', $viewData);
    }

    public function postUpdatePassword(UserUpdatePasswordRequest $request)
    {
        $token = $request->token;
        $dbToken = $this->checkToken($token);
        if (!$dbToken) return abort(404);

        $data['password'] = Hash::make($request->password);
        $user = User::where('email', $dbToken->email)->first();
        if (!$user) return  abort(404);

        $user->password = Hash::make($request->password);
        $user->save();

        \DB::table('password_resets')->where([
            'token' => $token
        ])->delete();

        return redirect()->route('user_get.login');
    }

    public function checkToken($token)
    {
        $dbToken = \DB::table('password_resets')->where([
            'token' => $token
        ])->first();

        return  $dbToken;
    }
}
