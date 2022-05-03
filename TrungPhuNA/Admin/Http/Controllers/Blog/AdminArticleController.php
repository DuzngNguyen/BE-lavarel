<?php

namespace TrungPhuNA\Admin\Http\Controllers\Blog;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminArticleRequest;
use TrungPhuNA\Admin\Http\Requests\AdminMenuRequest;
use TrungPhuNA\Blog\Entities\Article;
use TrungPhuNA\Blog\Entities\Menu;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::with('menu:id,m_name');
        if ($name = $request->name) $articles->where('a_name', 'like', '%' . $name . '%');

        $articles = $articles->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'articles' => $articles,
            'query'    => $request->query()
        ];

        return view('admin::pages.blog.article.index', $viewData);
    }

    public function create(Request $request)
    {
        $menus = Menu::all();
        if ($request->copy) $article = Article::find($request->copy);
        $viewData = [
            'menus'   => $menus,
            'article' => $article
        ];

        return view('admin::pages.blog.article.create', $viewData);
    }

    public function store(AdminArticleRequest $request)
    {
        try {

            $data = $request->except('_token', 'article_relate');
            if ($request->a_avatar) {
                $image = upload_image('a_avatar');

                if ($image['code'] == 1)
                    $data['a_avatar'] = $image['name'];
            }
            $article = Article::create($data);
            $this->processArticleRelate($request->article_relate ?? [], $article->id);
            return redirect()->route('get_admin.article.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $menus   = Menu::all();
        $article = Article::find($id);

        $articlesRelate = Article::whereHas('articleRelate', function ($query) use ($id) {
            $query->where('ar_article_id', $id);
        })->select('id', 'a_name')->get();

        $viewData = [
            'menus'          => $menus,
            'article'        => $article,
            'articlesRelate' => $articlesRelate
        ];

        return view('admin::pages.blog.article.update', $viewData);
    }

    protected function processArticleRelate($articleIds, $id)
    {
        \DB::table('articles_relate')->where('ar_article_id', $id)->delete();
        foreach ($articleIds as $articleID) {
            try {
                \DB::table('articles_relate')->insert([
                    'ar_article_id' => $id,
                    'ar_relate_id'  => $articleID
                ]);
            } catch (\Exception $exception) {
                Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
            }
        }
    }

    public function update(AdminArticleRequest $request, $id)
    {
        try {

            $data = $request->except('_token', 'article_relate');
            if ($request->a_avatar) {
                $image = upload_image('a_avatar');

                if ($image['code'] == 1)
                    $data['a_avatar'] = $image['name'];
            }
            $article = Article::find($id)->update($data);
            $this->processArticleRelate($request->article_relate ?? [], $id);
            return redirect()->route('get_admin.article.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return view('admin::pages.blog.article.update');

    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            if ($request->has('q')) {
                $search = $request->q;
                $data   = Article::select("id", "a_name")
                    ->where('a_name', 'LIKE', "%$search%")
                    ->limit(30)
                    ->get();
            }
            return response()->json($data);
        }
    }

    public function delete($id)
    {
        try {
            Article::find($id)->delete();
        } catch (\Exception $exception) {
            Log::error("[Error]: " . $exception->getMessage());
        }

        return redirect()->back();
    }
}
