<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 9/23/21 .
 * Time: 10:52 PM .
 */

namespace App\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use TrungPhuNA\Blog\Entities\Article;

class ArticleService
{
    public static function getArticlesByMenuId(Request $request, $menuId, $filter = [])
    {
        $articles = Article::with('menu:id,m_name,m_slug')
            ->where('a_menu_id', $menuId)
            ->orderByDesc('id')
            ->paginate(10);

        return $articles;
    }

    public static function getListArticlesNews(Request $request, $filter = [])
    {
        return Article::with('menu:id,m_name,m_slug')
            ->orderByDesc('id')
            ->select('id','a_name','a_slug','a_menu_id','created_at','a_description')
            ->limit(Arr::get($filter,'limit', 9))
            ->get();
    }

    public static function getListsArticlesRead(Request $request, $filter = [])
    {
        return Article::with('menu:id,m_name,m_slug')
            ->orderByDesc('a_view')
            ->select('id','a_name','a_slug','a_menu_id','created_at','a_description')
            ->limit(9)
            ->get();
    }

    public static function getArticleBySlug($slug)
    {
        return Article::where('a_slug', $slug)->first();
    }
}
