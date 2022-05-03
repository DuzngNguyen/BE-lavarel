<?php

namespace TrungPhuNA\Admin\Http\Controllers\Ecommerce;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminAttributeRequest;
use TrungPhuNA\Admin\Http\Requests\AdminCategoryRequest;
use TrungPhuNA\Ecommerce\Entities\Attribute;
use TrungPhuNA\Ecommerce\Entities\Category;

class AdminAttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'attributes' => $attributes
        ];

        return view('admin::pages.ecommerce.attribute.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.ecommerce.attribute.create');
    }

    public function store(AdminAttributeRequest $request)
    {
        try {

            $data     = $request->except('_token');
            $attribute = Attribute::create($data);

            return redirect()->route('get_admin.attribute.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $attribute = Attribute::find($id);
        $viewData = [
            'attribute' => $attribute
        ];

        return view('admin::pages.ecommerce.attribute.update', $viewData);
    }

    public function update(AdminAttributeRequest $request, $id)
    {
        try {

            $data     = $request->except('_token');
            $attribute = Attribute::find($id)->update($data);

            return redirect()->route('get_admin.attribute.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return  redirect()->back();
    }

    public function delete($id)
    {
        Attribute::find($id)->delete();
        return redirect()->back();
    }
}
