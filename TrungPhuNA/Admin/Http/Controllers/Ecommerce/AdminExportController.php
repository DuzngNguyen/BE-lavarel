<?php

namespace TrungPhuNA\Admin\Http\Controllers\Ecommerce;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use TrungPhuNA\Ecommerce\Entities\Order;

class AdminExportController extends Controller
{
    public function index(Request $request)
    {
        $inventoryExport = Order::with('product');

        $inventoryExport = $inventoryExport->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'inventoryExport' => $inventoryExport,
            'query' => $request->query()
        ];

        return view('admin::pages.ecommerce.export', $viewData);
    }
}
