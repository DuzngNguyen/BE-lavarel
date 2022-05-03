<?php

namespace TrungPhuNA\Admin\Http\Controllers\Ecommerce;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminAttributeRequest;
use TrungPhuNA\Admin\Http\Requests\AdminProductTypeRequest;
use TrungPhuNA\Ecommerce\Entities\Attribute;
use TrungPhuNA\Ecommerce\Entities\ProductType;
use TrungPhuNA\Ecommerce\Entities\ProducType;

class AdminProductTypeController extends Controller
{
    public function index()
    {
        $types = ProductType::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'types' => $types
        ];

        return view('admin::pages.ecommerce.type.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.ecommerce.type.create');
    }

    public function store(AdminProductTypeRequest $request)
    {
        try {

            $data     = $request->except('_token');
            $type = ProductType::create($data);

            return redirect()->route('get_admin.type.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $type = ProductType::find($id);
        $viewData = [
            'type' => $type
        ];

        return view('admin::pages.ecommerce.type.update', $viewData);
    }

    public function update(AdminProductTypeRequest $request, $id)
    {
        try {

            $data     = $request->except('_token');
            $type = ProductType::find($id)->update($data);

            return redirect()->route('get_admin.type.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return  redirect()->back();
    }

    public function delete($id)
    {
        ProductType::find($id)->delete();
        return redirect()->back();
    }
}
