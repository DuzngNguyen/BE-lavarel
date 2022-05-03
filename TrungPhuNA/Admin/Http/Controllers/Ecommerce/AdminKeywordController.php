<?php

namespace TrungPhuNA\Admin\Http\Controllers\Ecommerce;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminCategoryRequest;
use TrungPhuNA\Admin\Http\Requests\AdminKeywordRequest;
use TrungPhuNA\Ecommerce\Entities\Category;
use TrungPhuNA\Ecommerce\Entities\Keyword;

class AdminKeywordController extends Controller
{
    public function index()
    {
        $keywords = Keyword::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'keywords' => $keywords
        ];

        return view('admin::pages.keyword.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.keyword.create');
    }

    public function store(AdminKeywordRequest $request)
    {
        try {

            $data    = $request->except('_token');
            $keyword = Keyword::create($data);

            return redirect()->route('get_admin.keyword.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $keyword  = Keyword::find($id);
        $viewData = [
            'keyword' => $keyword
        ];

        return view('admin::pages.keyword.update', $viewData);
    }

    public function update(AdminKeywordRequest $request, $id)
    {
        try {

            $data    = $request->except('_token');
            $keyword = Keyword::find($id)->update($data);

            return redirect()->route('get_admin.keyword.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        Keyword::find($id)->delete();
        return redirect()->back();
    }
}
