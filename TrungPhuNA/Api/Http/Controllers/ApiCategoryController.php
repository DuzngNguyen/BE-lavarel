<?php

namespace TrungPhuNA\Api\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Api\HelpersClass\ResponseMetaService;
use TrungPhuNA\Api\HelpersClass\ResponseService;
use TrungPhuNA\Api\Transformers\CategoryCollection;
use TrungPhuNA\Ecommerce\Entities\Category;

class ApiCategoryController extends Controller
{
    public function index(Request $request)
    {
        try {
            $categories = Category::whereRaw(1);

            if ($columns = $request->columns) {
                $columns = explode(',', $columns);
            }
            if ($limit = $request->limit)
                $this->limit = $limit;

            $categories = $categories->select($columns ?? "*")->paginate($limit);

            $meta       = ResponseMetaService::getMeta($categories);
            $categories = CategoryCollection::collection($categories->getCollection());

            $results = ['categories' => $categories, 'meta' => $meta];

            return response()->json(ResponseService::getSuccess($results));

        } catch (\Exception $exception) {
            Log::error("API: " . $exception->getMessage(), );
            return response()->json(ResponseService::getError("Có lỗi xẩy ra, xin vui lòng kiểm tra lại"));
        }
    }

    public function getCategoryBySlug(Request $request, $slug)
    {
        try {
            $category = Category::where('c_slug', $slug)->first();

            $category = new CategoryCollection($category);
            $results  = ['category' => $category];

            return response()->json(ResponseService::getSuccess($results));
        } catch (\Exception $exception) {
            Log::error("API: " . $exception->getMessage());
            return response()->json(ResponseService::getError("Có lỗi xẩy ra, xin vui lòng kiểm tra lại"));
        }
    }
}
