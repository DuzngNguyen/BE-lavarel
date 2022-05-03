<?php

namespace TrungPhuNA\Api\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Api\HelpersClass\ResponseService;
use TrungPhuNA\Api\Service\ApiOrderService;
use TrungPhuNA\Api\Service\ApiTransactionService;
use TrungPhuNA\Api\Service\ApiUserService;

class ApiTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('api::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('api::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = ApiUserService::getUserLogin($request);
            if (!$user) {
                return response()->json(ResponseService::getError("Đăng nhập để thực hiện chức năng này"));
            }

            $shopping = $request->shopping;
            if(empty($shopping)) {
                return response()->json(ResponseService::getError("Đăng nhập để thực hiện chức năng này"));
            }

            $total = 0;
            foreach ($shopping as $item)
                $total = $item['qty'] * $item['price'];

            $dataTransaction = [
                'total' => $total,
            ];

            $transaction = ApiTransactionService::store($dataTransaction, $user);
            if ($transaction) {
                $order = ApiOrderService::store($shopping, $transaction);
            }

            $results = ['user' => $user, 'transaction' => $transaction, 'order' => $order ?? ''];
            DB::commit();
            return response()->json(ResponseService::getSuccess($results));

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("API: " . $exception->getMessage());
            return response()->json(ResponseService::getError("Có lỗi xẩy ra, xin vui lòng kiểm tra lại"));
        }
    }
}
