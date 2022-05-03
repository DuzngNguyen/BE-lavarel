<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 6/7/21 .
 * Time: 1:18 AM .
 */

namespace TrungPhuNA\Api\HelpersClass;


class ResponseMetaService
{
    public static function getMeta($datas)
    {
        $meta = [
            "total"        => $datas->total(),
            "per_page"     => $datas->perPage(),
            "current_page" => $datas->currentPage(),
            "last_page"    => $datas->lastPage()
        ];

        return $meta;
    }
}
