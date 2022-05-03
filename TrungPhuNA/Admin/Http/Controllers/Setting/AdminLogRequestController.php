<?php

namespace TrungPhuNA\Admin\Http\Controllers\Setting;

use App\Models\LogRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminLogRequestController extends Controller
{
    public function index(Request $request)
    {
        $logs = LogRequest::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'logs' => $logs
        ];

        return view('admin::pages.setting.logs.index', $viewData);
    }

    public function show(Request $request, $id)
    {
        $log = LogRequest::find($id);
        return response()->json($log);
    }
}
