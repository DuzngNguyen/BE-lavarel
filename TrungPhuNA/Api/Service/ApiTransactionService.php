<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 6/11/21 .
 * Time: 1:04 AM .
 */

namespace TrungPhuNA\Api\Service;


use Carbon\Carbon;
use TrungPhuNA\Ecommerce\Entities\Transaction;

class ApiTransactionService
{
    public static function store($transaction, $user)
    {
        $transaction = Transaction::create([
            't_user_id'     => $user->id,
            't_total_money' => $transaction['total'],
            'created_at'    => Carbon::now()
        ]);

        return $transaction;
    }
}
