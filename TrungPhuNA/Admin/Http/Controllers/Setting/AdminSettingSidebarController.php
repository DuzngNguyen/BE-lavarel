<?php

namespace TrungPhuNA\Admin\Http\Controllers\Setting;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Setting\Entities\SettingNav;
use TrungPhuNA\Setting\Entities\SettingSidebar;

class AdminSettingSidebarController extends Controller
{
    public function index()
    {
        $sidebars = SettingSidebar::orderBy('m_sort','asc')->get();

        $viewData = [
            'sidebars' => $sidebars
        ];

        return view('admin::pages.setting.sidebar.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.setting.sidebar.create');
    }

    public function store(Request $request)
    {
        try {

            $data               = $request->except('_token');
            $data['m_sub_menu'] = json_encode($request->m_sub_menu);
            $sidebar            = SettingSidebar::create($data);
            $this->checkSubMenu($sidebar);
            return redirect()->route('get_admin.sidebar.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $sidebar  = SettingSidebar::find($id);
        $viewData = [
            'sidebar' => $sidebar
        ];

        return view('admin::pages.setting.sidebar.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        try {
            $sidebar            = SettingSidebar::find($id);
            $data               = $request->except('_token');
            $data['m_sub_menu'] = json_encode($request->m_sub_menu);
            $sidebar->fill($data)->save();
            $this->checkSubMenu($sidebar);

            return redirect()->route('get_admin.sidebar.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    protected function updateSort(Request $request)
    {
        if ($request->ajax()) {
            $data = (array)explode("-", $request->data);
            if (!empty($data)) {
                foreach ($data as $key => $id) {
                    $nav         = SettingSidebar::find($id);
                    $nav->m_sort = $key + 1;
                    $nav->save();
                }
            }

            return response()->json([
                'status' => 200,
                'reload' => true
            ]);
        }
    }

    protected function checkSubMenu($sidebar)
    {
        $subMenus = json_decode($sidebar->m_sub_menu, true) ?? [];
        foreach ($subMenus['name'] as $key => $item) {
            if ($item) {
                $sidebar->m_sub_flag = 1;
                $sidebar->save();
                break;
            }
        }
    }

    public function delete($id)
    {
        SettingSidebar::find($id)->delete();
        return redirect()->back();
    }
}
