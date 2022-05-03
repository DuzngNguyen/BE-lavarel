<?php

namespace TrungPhuNA\Admin\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminProductItemRequest;
use TrungPhuNA\Ecommerce\Entities\Product;
use TrungPhuNA\Ecommerce\Entities\ProductItem;

class AdminProductItemController extends Controller
{
    public function index(Request $request)
    {
        $products = ProductItem::with('product:pro_name,pro_slug,id')->whereRaw(1);

        $products = $products->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'products' => $products,
            'query'    => $request->query()
        ];

        return view('admin::pages.ecommerce.product_item.index', $viewData);
    }

    public function create()
    {
        $viewData = [

        ];

        return view('admin::pages.ecommerce.product_item.create', $viewData);
    }

    public function store(AdminProductItemRequest $request)
    {
        try {

            $data = $request->except('_token');
            if ($request->pi_avatar) {
                $image = upload_image('pi_avatar');
                if ($image['code'] == 1)
                    $data['pi_avatar'] = $image['name'];
            }
            $product = ProductItem::create($data);
            if ($product && $product->pi_product_id) {
                $product                     = Product::find($product->pi_product_id);
                $product->pro_variable_total += 1;
                $product->save();
            }

            return redirect()->route('get_admin.product_item.index');

        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine()
                . " File: " . $exception->getFile()
                . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $product        = ProductItem::find($id);
        $productsSelect = Product::where('id', $product->pi_product_id)->select('pro_name', 'id')->get();

        $viewData = [
            'product'        => $product,
            'productsSelect' => $productsSelect
        ];

        return view('admin::pages.ecommerce.product_item.update', $viewData);
    }

    public function update(AdminProductItemRequest $request, $id)
    {
        try {
            $data         = $request->except('_token');
            $productItem  = ProductItem::find($id);
            $productIdOld = $productItem->pi_product_id;
            if ($request->pi_avatar) {
                $image = upload_image('pi_avatar');
                if ($image['code'] == 1)
                    $data['pi_avatar'] = $image['name'];
            }
            $product = ProductItem::find($id)->update($data);

            if ($product) {
                if ($product && $product->pi_product_id != $productIdOld) {
                    $product                     = Product::find($product->pi_product_id);
                    $product->pro_variable_total += 1;
                    $product->save();

                    $product                     = Product::find($productIdOld);
                    $product->pro_variable_total -= 1;
                    $product->save();
                }
            }
            return redirect()->route('get_admin.product_item.index');

        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine()
                . " File: " . $exception->getFile()
                . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();

    }


    public function delete($id)
    {
        $productItem  = ProductItem::find($id);
        if ($productItem)
        {
            $product                     = Product::find($productItem->pi_product_id);
            $product->pro_variable_total -= 1;
            $product->save();
            $productItem->delete();
        }

        return redirect()->back();
    }
}
