<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 6/11/21 .
 * Time: 1:04 AM .
 */

namespace TrungPhuNA\Api\Service;


use Illuminate\Http\Request;

class ApiUserService
{
    public static function getUserLogin(Request $request)
    {
        return $request->user();
    }
}
