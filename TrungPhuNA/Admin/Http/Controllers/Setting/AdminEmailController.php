<?php

namespace TrungPhuNA\Admin\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Setting\Entities\SettingEmail;

class AdminEmailController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            try {
                $email = SettingEmail::first();
                $html  = view('admin::pages.setting.include._inc_popup_email', compact('email'))->render();
                return response()->json([
                    'status' => 200,
                    'html'   => $html
                ]);
            } catch (\Exception $exception) {
                Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
            }
        }
    }

    public function store(Request $request)
    {
        try {
            $email = SettingEmail::first();
            if (!$email) $email = new SettingEmail();

            $email->mail_driver       = $request->mail_driver;
            $email->mail_port         = $request->mail_port;
            $email->mail_host         = $request->mail_host;
            $email->mail_username     = $request->mail_username;
            $email->mail_password     = $request->mail_password;
            $email->mail_domain       = $request->mail_domain;
            $email->mail_from_address = $request->mail_from_address;
            $email->save();
            return response()->json([
                'status' => 200
            ]);
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return response()->json([
            'status' => 401
        ]);
    }
}
