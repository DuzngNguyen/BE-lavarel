<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/26/21 .
 * Time: 2:27 AM .
 */

namespace TrungPhuNA\Setting\Services;

use TrungPhuNA\Setting\Entities\SettingNav;

class SettingNavService
{
    public static function renderUrlByType($request, $type)
    {
        $html = '';
        switch ($type) {
            case SettingNav::TYPE_URL:
                $html = view('admin::pages.setting.nav.include.inc_url')->render();
                break;

//            case SettingNav::TYPE_CATEGORY:
//                $categories = Category::all();
//                $html       = view('admin::pages.nav.include.inc_category', compact('categories'))->render();
//                break;
//
//            case SettingNav::TYPE_PRODUCT:
//                $products = Product::all();
//                $html     = view('admin::pages.nav.include.inc_product', compact('products'))->render();
//                break;
//            case SettingNav::TYPE_KEYWORD:
//                $keywords = Keyword::all();
//                $html     = view('admin::pages.nav.include.inc_keyword', compact('keywords'))->render();
//                break;
        }

        return $html;
    }
}
