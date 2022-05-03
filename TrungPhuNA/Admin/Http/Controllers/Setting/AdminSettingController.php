<?php

namespace TrungPhuNA\Admin\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminSettingController extends Controller
{
    public function index()
    {
        return view('admin::pages.setting.index');
    }
}
