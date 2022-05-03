<?php

namespace TrungPhuNA\Admin\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Setting\Entities\SettingEmail;
use TrungPhuNA\Setting\Entities\SettingGeneral;

class AdminSettingGeneralController extends Controller
{
    public $meta = [
        'logo'    => '',
        'favicon' => ''
    ];

    public function index(Request $request)
    {
        if ($request->ajax()) {
            try {
                $setting = SettingGeneral::first();
                $meta = json_decode($setting->sg_meta, true) ?? $this->meta;

                $html    = view('admin::pages.setting.include._inc_popup_setting_general', compact('setting','meta'))->render();
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
            Log::info($request->all());
            $setting = SettingGeneral::first();

            $meta = $this->meta;

            if (!$setting) {
                $setting = new SettingGeneral();
            }else{
                $meta = json_decode($setting->sg_meta);
            }
            $data = $request->except('_token', 'sg_logo', 'sg_favicon');

            $setting->fill($data)->save();



            if ($request->hasFile('sg_logo')) {
                $image = upload_image('sg_logo');
                if ($image['code'] == 1)
                    $meta['logo'] = $image['name'];
            }

            if ($request->hasFile('sg_favicon')) {
                $image = upload_image('sg_favicon');
                if ($image['code'] == 1)
                    $meta['favicon'] = $image['name'];
            }
            Log::info($meta);
            $setting->sg_meta = json_encode($meta);
            $setting->save();

            return response()->json([
                'status' => 200
            ]);
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }
    }
}
