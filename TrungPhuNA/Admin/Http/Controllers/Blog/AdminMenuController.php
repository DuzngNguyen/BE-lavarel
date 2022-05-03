<?php

namespace TrungPhuNA\Admin\Http\Controllers\Blog;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminCategoryRequest;
use TrungPhuNA\Admin\Http\Requests\AdminMenuRequest;
use TrungPhuNA\Blog\Entities\Menu;
use TrungPhuNA\Ecommerce\Entities\Category;

class AdminMenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'menus' => $menus
        ];

        return view('admin::pages.blog.menu.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.blog.menu.create');
    }

    public function store(AdminMenuRequest $request)
    {
        try {

            $data     = $request->except('_token');
            if ($request->m_avatar) {
                $image = upload_image('m_avatar');

                if ($image['code'] == 1)
                    $data['m_avatar'] = $image['name'];
            }
            $menu = Menu::create($data);

            return redirect()->route('get_admin.menu.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        $viewData = [
            'menu' => $menu
        ];

        return view('admin::pages.blog.menu.update', $viewData);
    }

    public function update(AdminMenuRequest $request, $id)
    {
        try {

            $data     = $request->except('_token');
            if ($request->m_avatar) {
                $image = upload_image('m_avatar');

                if ($image['code'] == 1)
                    $data['m_avatar'] = $image['name'];
            }

            $menu = Menu::find($id)->update($data);

            return redirect()->route('get_admin.menu.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return view('admin::pages.blog.menu.update');

    }

    public function delete($id)
    {

    }
}
