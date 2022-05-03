<?php

namespace TrungPhuNA\Admin\Http\Controllers\Document;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Entities\CategoryDocument;
use TrungPhuNA\Admin\Entities\Document;

class AdminDocumentController extends Controller
{
    public function index(Request $request)
    {
        $documents  = Document::with('category:name,id')->whereRaw(1);
        $categories = CategoryDocument::all();

        if ($request->name)
            $documents->where('name', 'like', '%' . $request->name . '%');

        if ($request->cate_id)
            $documents->where('category_id', $request->cate_id);

        $documents = $documents->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'documents'  => $documents,
            'query'      => $request->query(),
            'categories' => $categories
        ];

        return view('admin::pages.document.index', $viewData);
    }

    public function create()
    {
        $categories = CategoryDocument::all();
        $viewData   = [
            'categories' => $categories
        ];

        return view('admin::pages.document.create', $viewData);
    }

    public function store(Request $request)
    {
        try {

            $data          = $request->except('_token');
            $data['price'] = str_replace(',', '', $request->price);
            $document      = Document::create($data);

            return redirect()->route('get_admin.document.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $document   = Document::find($id);
        $categories = CategoryDocument::all();
        $viewData   = [
            'document'   => $document,
            'categories' => $categories
        ];

        return view('admin::pages.document.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        try {

            $data          = $request->except('_token');
            $data['price'] = str_replace(',', '', $request->price);
            $document      = Document::find($id)->update($data);


            return redirect()->route('get_admin.document.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        Document::find($id)->delete();
        return redirect()->back();
    }
}
