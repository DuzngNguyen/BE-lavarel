<?php

namespace TrungPhuNA\Admin\Http\Controllers\Ecommerce;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminProductRequest;
use TrungPhuNA\Ecommerce\Entities\Attribute;
use TrungPhuNA\Ecommerce\Entities\Category;
use TrungPhuNA\Ecommerce\Entities\Product;
use TrungPhuNA\Ecommerce\Entities\ProductType;
use TrungPhuNA\Ecommerce\Services\ProductAttributeService;
use TrungPhuNA\Ecommerce\Services\ProductCategoryService;
use TrungPhuNA\Ecommerce\Services\ProductImageService;
use TrungPhuNA\Ecommerce\Services\ProductPriceService;
use TrungPhuNA\Ecommerce\Services\ProductTypeService;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('categories:id,c_name')->whereRaw(1);
        if ($cate = $request->c) $products->whereHas('categories', function ($query) use ($cate) {
            $query->where('pc_category_id', $cate);
        });

        if($name = $request->name)
            $products->where('pro_name','like','%'.$name.'%');

        $products = $products->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'products' => $products,
            'request'  => $request,
            'query'    => $request->query()
        ];

        return view('admin::pages.ecommerce.product.index', $viewData);
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        $types      = ProductType::all();

        if ($id = $request->copy) $product = Product::find($id);
        $viewData = [
            'categories' => $categories,
            'attributes' => $attributes,
            'types'      => $types,
            'product'    => $product ?? null
        ];

        return view('admin::pages.ecommerce.product.create', $viewData);
    }

    public function store(AdminProductRequest $request)
    {
        try {

            $data                       = $request->except('_token');
            $data['pro_price']          = str_replace(',', '', $request->pro_price);
//            $data['pro_price_children'] = str_replace(',', '', $request->pro_price_children);
            if ($request->pro_avatar) {
                $image = upload_image('pro_avatar');
                if ($image['code'] == 1)
                    $data['pro_avatar'] = $image['name'];
            }
            $product = Product::create($data);

            if ($product) {
                ProductAttributeService::syncProductAttribute($product->id, $request->attributesArr);
                ProductPriceService::syncProductPrice($product->id, $request);
                ProductCategoryService::syncProductCategory($product->id, $request->categories);
                ProductImageService::syncProductImages($product->id, $request->albums);
                ProductTypeService::syncProductType($product->id, $request->products_type);
            }

            return redirect()->route('get_admin.product.index');

        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine()
                . " File: " . $exception->getFile()
                . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $product          = Product::find($id);
        $categories       = Category::all();
        $attributes       = Attribute::all();
        $types            = ProductType::all();
        $attributesActive = ProductAttributeService::getListAttributeByProductId($id);
        $categoryActive   = ProductCategoryService::getListCategoryByProductId($id);
        $productPrice     = ProductPriceService::getProductsPriceByProductID($id);
        $productTypes     = ProductTypeService::getProductsTypeProductID($id);
        $images           = ProductImageService::getImagesByProductID($id);

        $viewData = [
            'categories'       => $categories,
            'product'          => $product,
            'types'            => $types,
            'attributes'       => $attributes,
            'attributesActive' => $attributesActive,
            'categoryActive'   => $categoryActive,
            'productTypes'     => $productTypes,
            'productPrice'     => $productPrice,
            'images'           => $images
        ];

        return view('admin::pages.ecommerce.product.update', $viewData);
    }

    public function update(AdminProductRequest $request, $id)
    {
        try {

            $data                       = $request->except('_token','pro_avatar');
            $data['pro_price']          = str_replace(',', '', $request->pro_price);
//            $data['pro_price_children'] = str_replace(',', '', $request->pro_price_children);
            if ($request->pro_avatar) {
                $image = upload_image('pro_avatar');

                if ($image['code'] == 1)
                    $data['pro_avatar'] = $image['name'];
            }
            $product = Product::find($id)->update($data);

            if ($product) {
                ProductAttributeService::syncProductAttribute($id, $request->attributesArr);
                ProductPriceService::syncProductPrice($id, $request);
                ProductImageService::syncProductImages($id, $request->albums);
                ProductCategoryService::syncProductCategory($id, $request->categories);
                ProductTypeService::syncProductType($id, $request->products_type);
            }

            return redirect()->route('get_admin.product.index');

        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine()
                . " File: " . $exception->getFile()
                . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();

    }

    public function deleteImage(Request $request, $id)
    {
        try {
            ProductImageService::deleteImageItem($id);
            return response()->json([
                'status' => 200
            ]);
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine()
                . " File: " . $exception->getFile()
                . " Messages: " . $exception->getMessage());
        }
    }

    public function searchProduct(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            if ($request->has('q')) {
                $search = $request->q;
                $data   = Product::select("id", "pro_name")
                    ->where('pro_name', 'LIKE', "%$search%")
                    ->limit(30)
                    ->get();
            }
            return response()->json($data);
        }
    }

    public function info(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;
            $products = Product::whereIn('id', (array)$id)->get();

            $html  = view('admin::pages.ecommerce.transaction.include._inc_product_info', compact('products'))->render();
            return response()->json([
                'status' => 200,
                'html'   => $html
            ]);
        }
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }
}
