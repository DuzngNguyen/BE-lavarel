<?php

namespace TrungPhuNA\Admin\Http\Controllers\BusinessControl;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use TrungPhuNA\Admin\Entities\Expenditure;
use TrungPhuNA\Ecommerce\Entities\Transaction;
use TrungPhuNA\Setting\Helpers\FilterHelper;

class AdminSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->time) {
            $time = FilterHelper::getStartEndTime($request->time, ['ymd' => true]);

            // Chi

            $expenditures = Expenditure::with('admin:id,name')
                ->where('e_type', Expenditure::TYPE_SPEND)
                ->whereBetween('e_date', $time)
                ->get();

            // Thu

            $transactions = Transaction::with('orders', 'user:id,name', 'admin:id,name')
                ->whereBetween('t_time_process', $time)
                ->where('t_status', Transaction::STATUS_SUCCESS)
                ->get();

        }

        $viewData = [
            'expenditures' => $expenditures ?? [],
            'transactions' => $transactions ?? []
        ];

        return view('admin::pages.turnover.index', $viewData);
    }

}
