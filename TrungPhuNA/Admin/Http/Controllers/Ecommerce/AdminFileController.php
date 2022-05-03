<?php

namespace TrungPhuNA\Admin\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Ecommerce\Entities\File;

class AdminFileController extends Controller
{
    protected $extend = [
        'doc', 'docx','zip','rar','pptx', 'sql','php'
    ];

    public function index()
    {
        $files = File::with('product:id,pro_name')->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'files' => $files
        ];

        return view('admin::pages.ecommerce.file.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.ecommerce.file.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except('_token','f_path');
            if ($request->f_path) {
                $image = upload_image('f_path', 'files', $this->extend);
                if ($image['code'] == 1) {
                    $data['f_path'] = $image['name'];
                    $meta['file']   = [
                        'name' => $image['name'],
                        'ext'  => $image['ext'],
                        'size' => $image['size'],
                    ];
                    $data['f_ext'] = $image['ext'];
                    $data['f_meta'] = json_encode($meta['file']);
                }
            }
            $type = File::create($data);

            return redirect()->route('get_admin.file.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $file     = File::find($id);
        $viewData = [
            'file' => $file
        ];

        return view('admin::pages.ecommerce.file.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        try {

            $data = $request->except('_token','f_path');
            if ($request->f_path) {
                $image = upload_image('f_path', 'files', $this->extend);

                if ($image['code'] == 1) {
                    $data['f_path'] = $image['name'];
                    $meta['file']   = [
                        'name' => $image['name'],
                        'ext'  => $image['ext'],
                        'size' => $image['size'],
                    ];
                    $data['f_ext'] = $image['ext'];
                    $data['f_meta'] = json_encode($meta['file']);
                }
            }

            $type = File::find($id)->update($data);

            return redirect()->route('get_admin.file.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function delete($id)
    {

    }
}
