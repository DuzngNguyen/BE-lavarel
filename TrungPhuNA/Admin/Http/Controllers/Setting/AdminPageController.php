<?php

namespace TrungPhuNA\Admin\Http\Controllers\Setting;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Entities\Page;
use TrungPhuNA\Admin\Http\Requests\AdminPageRequest;

class AdminPageController extends Controller
{
    public function index()
    {
        $pages = Page::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'pages' => $pages
        ];

        return view('admin::pages.setting.static.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.setting.static.create');
    }

    public function store(AdminPageRequest $request)
    {
        try {

            $data        = $request->except('_token');
            $data['url'] = $this->replaceUrl($request->url);
            $page        = Page::create($data);

            return redirect()->route('get_admin.page.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $page     = Page::find($id);
        $viewData = [
            'page' => $page
        ];

        return view('admin::pages.setting.static.update', $viewData);
    }

    public function update(AdminPageRequest $request, $id)
    {
        try {

            $data        = $request->except('_token');
            $data['url'] = $this->replaceUrl($request->url);
            $page        = Page::find($id)->update($data);

            return redirect()->route('get_admin.page.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();

    }

    protected function replaceUrl($url)
    {
        return parse_url($url)['path'] ?? '';
    }

    public function delete($id)
    {

    }
}
