<?php

namespace TrungPhuNA\Api\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Api\HelpersClass\ResponseService;
use TrungPhuNA\Ecommerce\Entities\Order;
use TrungPhuNA\Ecommerce\Entities\Product;
use TrungPhuNA\Ecommerce\Entities\Transaction;

class ApiShoppingCartController extends Controller
{
    public function saveShopping(Request $request)
    {
        try {
            DB::beginTransaction();
            $productID    = $request->products_id;
            $user         = request()->user() ?? [];
            $product      = Product::find($productID);

            $transaction = Transaction::create([
                't_user_id'     => $user->id,
                't_total_money' => $product->pro_price,
                't_phone'       => $user->phone,
                't_name'        => $user->name,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);

            if ($transaction) {
                Order::insert([
                    'o_transaction_id' => $transaction->id,
                    'o_action_id'      => $product->id,
                    'o_qty'            => 1,
                    'o_price'          => $product->pro_price,
                    'created_at'       => Carbon::now()
                ]);
            }

            $results = [
                'transaction' => $transaction ?? [],
                'product'     => $product ?? '',
            ];

            DB::commit();
            return response()->json(ResponseService::getSuccess($results));

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("API: " . $exception->getMessage() . " -- LINE: " . $exception->getLine());
            return response()->json(ResponseService::getError("Có lỗi xẩy ra, xin vui lòng kiểm tra lại"));
        }
    }

    public function listsTransactions(Request $request)
    {
        try {
            $user = request()->user() ?? [];
            $transactions = Transaction::where('t_user_id', $user->id)->get();
            $results = [
                'transactions' => $transactions ?? [],
                'user'         => $user
            ];
            return response()->json(ResponseService::getSuccess($results));

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("API: " . $exception->getMessage() . " -- LINE: " . $exception->getLine());
            return response()->json(ResponseService::getError("Có lỗi xẩy ra, xin vui lòng kiểm tra lại"));
        }
    }
}
