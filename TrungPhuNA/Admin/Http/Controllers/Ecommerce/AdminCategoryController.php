<?php

namespace TrungPhuNA\Admin\Http\Controllers\Ecommerce;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminCategoryRequest;
use TrungPhuNA\Ecommerce\Entities\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'categories' => $categories
        ];

        return view('admin::pages.ecommerce.category.index', $viewData);
    }

    public function create()
    {
        $categories = $this->getCategoriesSort();
        return view('admin::pages.ecommerce.category.create', compact('categories'));
    }

    public function store(AdminCategoryRequest $request)
    {
        try {

            $data = $request->except('_token');
            if ($request->c_avatar) {
                $image = upload_image('c_avatar');
                if ($image['code'] == 1)
                    $data['c_avatar'] = $image['name'];
            }
            $category = Category::create($data);

            return redirect()->route('get_admin.category.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $category   = Category::find($id);
        $categories = $this->getCategoriesSort();
        $viewData   = [
            'category'   => $category,
            'categories' => $categories
        ];

        return view('admin::pages.ecommerce.category.update', $viewData);
    }

    public function update(AdminCategoryRequest $request, $id)
    {
        try {

            $data = $request->except('_token');
            if ($request->c_avatar) {
                $image = upload_image('c_avatar');
                if ($image['code'] == 1)
                    $data['c_avatar'] = $image['name'];
            }
            $category = Category::find($id)->update($data);

            return redirect()->route('get_admin.category.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return view('admin::pages.ecommerce.category.update');

    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }

    protected function getCategoriesSort()
    {
        $categories = Category::select('id', 'c_parent_id', 'c_name')->get();

        $listCategoriesSort = [];
        Category::recursive($categories, $parent = 0, $level = 1, $listCategoriesSort);
        return $listCategoriesSort;
    }
}
