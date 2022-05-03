<?php

namespace TrungPhuNA\Admin\Http\Controllers\Blog;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminTagRequest;
use TrungPhuNA\Blog\Entities\Tag;

class AdminTagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'tags' => $tags
        ];

        return view('admin::pages.blog.tag.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.blog.tag.create');
    }

    public function store(AdminTagRequest $request)
    {
        try {

            $data    = $request->except('_token');
            $tag = Tag::create($data);

            return redirect()->route('get_admin.tag.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $tag  = Tag::find($id);
        $viewData = [
            'tag' => $tag
        ];

        return view('admin::pages.blog.tag.update', $viewData);
    }

    public function update(AdminTagRequest $request, $id)
    {
        try {

            $data    = $request->except('_token');
            $tag = Tag::find($id)->update($data);

            return redirect()->route('get_admin.tag.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function delete($id)
    {

    }
}
