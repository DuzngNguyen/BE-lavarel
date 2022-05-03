<?php

namespace TrungPhuNA\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Api\HelpersClass\ResponseMetaService;
use TrungPhuNA\Api\HelpersClass\ResponseService;
use TrungPhuNA\Api\Transformers\ProductCollection;
use TrungPhuNA\Ecommerce\Entities\Product;

class ApiProductController extends Controller
{
    protected $limit = 10;

    public function index(Request $request)
    {
        $header = $request->header('X-PORT-TYPE');
        try {
            $products = Product::whereRaw(1);

            if ($categoryID = $request->category_id) {
                 $products->whereHas('categories', function ($query) use ($categoryID) {
                    $query->where('pc_category_id', $categoryID);
                });
            }

            if ($columns = $request->columns) {
                $columns = explode(',', $columns);
            }

            if ($limit = $request->limit)
                $this->limit = $limit;

            $products = $products->select($columns ?? "*")->paginate($limit);

            $meta     = ResponseMetaService::getMeta($products);
            $products = ProductCollection::collection($products->getCollection());

            $results  = ['products' => $products, 'meta' => $meta];

            return response()->json(ResponseService::getSuccess($results));

        } catch (\Exception $exception) {
            Log::error("API: " . $exception->getMessage());
            return response()->json(ResponseService::getError("Có lỗi xẩy ra, xin vui lòng kiểm tra lại"));
        }
    }

    public function getProductBySlug(Request $request, $slug)
    {
        try {
            $product = Product::where('pro_slug', $slug)->first();
            $results = ['product' => $product, 'meta' => []];

            return response()->json(ResponseService::getSuccess($results));

        } catch (\Exception $exception) {
            Log::error("API: " . $exception->getMessage());
            return response()->json(ResponseService::getError("Có lỗi xẩy ra, xin vui lòng kiểm tra lại"));
        }
    }

    public function show($id)
    {
        try {
            $product = Product::find($id);
            $results = ['product' => $product, 'meta' => []];

            return response()->json(ResponseService::getSuccess($results));

        } catch (\Exception $exception) {
            Log::error("API: " . $exception->getMessage());
            return response()->json(ResponseService::getError("Có lỗi xẩy ra, xin vui lòng kiểm tra lại"));
        }
    }
}
