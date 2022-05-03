<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 9/23/21 .
 * Time: 10:51 PM .
 */

namespace App\Service;


use TrungPhuNA\Blog\Entities\Menu;

class MenuService
{
    public static function getAll()
    {
        return Menu::all();
    }

    public static function findMenuBySlug($slug)
    {
        return Menu::where('m_slug', $slug)->first();
    }

    public static function findMenuById($id)
    {
        return Menu::findOrFail($id);
    }
}
