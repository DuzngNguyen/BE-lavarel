<?php

namespace TrungPhuNA\Admin\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Entities\Page;
use TrungPhuNA\Admin\Http\Requests\AdminPageRequest;
use TrungPhuNA\Setting\Entities\SettingEmbedCode;
use File;
class AdminSettingEmbedCodeController extends Controller
{
    public function index()
    {
        $embeds = SettingEmbedCode::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'embeds' => $embeds
        ];

        return view('admin::pages.setting.embed.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.setting.embed.create');
    }

    public function store(Request $request)
    {
        try {

            $data        = $request->except('_token');
            $embed        = SettingEmbedCode::create($data);

            return redirect()->route('get_admin.embed.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $embed     = SettingEmbedCode::find($id);
        $viewData = [
            'embed' => $embed
        ];

        return view('admin::pages.setting.embed.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        try {

            $data        = $request->except('_token');
            $embed        = SettingEmbedCode::find($id)->update($data);

            return redirect()->route('get_admin.embed.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();

    }

    public function delete($id)
    {

    }
}
