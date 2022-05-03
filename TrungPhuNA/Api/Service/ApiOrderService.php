<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 6/11/21 .
 * Time: 1:22 AM .
 */

namespace TrungPhuNA\Api\Service;


use Carbon\Carbon;
use TrungPhuNA\Ecommerce\Entities\Order;

class ApiOrderService
{
    public static function store($orders, $transaction)
    {
        $results = [];
        foreach ($orders as $item) {
            $itemOrder = Order::create([
                'o_transaction_id' => $transaction->id,
                'o_action_id'      => $item['product_id'],
                'o_qty'            => $item['qty'],
                'o_price'          => $item['price'],
                'created_at'       => Carbon::now()
            ]);
            $results[] = $itemOrder;
        }

        return $results;
    }
}
