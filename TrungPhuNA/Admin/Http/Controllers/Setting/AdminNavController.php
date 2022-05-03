<?php

namespace TrungPhuNA\Admin\Http\Controllers\Setting;

use App\Models\System\NavBar;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Setting\Entities\SettingNav;
use TrungPhuNA\Setting\Services\SettingNavService;

class AdminNavController extends Controller
{
    public function index(Request $request)
    {
        $navs = SettingNav::orderBy('sn_sort','asc')->get();

        $viewData = [
            'navs' => $navs
        ];

        if($request->ajax()) {
            $html = view('admin::pages.setting.nav.include._inc_list_nav', $viewData)->render();
            return  response()->json([
                'status' => 200,
                'html' => $html
            ]);
        }

        return view('admin::pages.setting.nav.index', $viewData);
    }

    public function create()
    {
        $types = (new SettingNav())->getType();

        $viewData = [
            'types' => $types
        ];

        return view('admin::pages.setting.nav.create', $viewData);
    }

    public function store(Request $request)
    {
        try {

            $data = $request->except('_token');
            $nav  = SettingNav::create($data);

            return redirect()->route('get_admin.nav.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $nav      = SettingNav::find($id);
        $types    = (new SettingNav())->getType();
        $viewData = [
            'nav'   => $nav,
            'types' => $types
        ];

        return view('admin::pages.setting.nav.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        try {

            $data = $request->except('_token');
            $nav  = SettingNav::find($id)->update($data);

            return redirect()->route('get_admin.nav.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();

    }

    public function loadType(Request $request, $type)
    {
        if ($request->ajax()) {
            $html = SettingNavService::renderUrlByType($request, $type);
            return response()->json([
                'status' => 200,
                'html'   => $html
            ]);
        }
    }

    protected function updateSort(Request $request)
    {
        if($request->ajax())
        {
            $data = (array)explode("-",$request->data);
            if(!empty($data))
            {
                foreach ($data as $key => $id)
                {
                    $nav = SettingNav::find($id);
                    $nav->sn_sort = $key + 1;
                    $nav->save();
                }
            }

            return response()->json([
                'status' => 200,
                'data' => $data
            ]);
        }
    }

    public function delete($id)
    {

    }
}
