<?php

namespace TrungPhuNA\Admin\Http\Controllers;

use App\Models\User;
use App\Service\RenderMetaSeoService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Ecommerce\Entities\Product;
use TrungPhuNA\Ecommerce\Entities\Transaction;

class AdminStatisticalController extends Controller
{
    public function index(Request $request)
    {
        $totalUser        = User::select('id')->count();
        $totalTransaction = Transaction::select('id')->count();
        $status           = (new Transaction())->getStatus();

        $totalProducts = Product::select('id')->count();

        RenderMetaSeoService::render([
            'title' => 'Thống kê',
        ]);


        $viewData = [
            'totalUser'        => $totalUser,
            'totalProducts'    => $totalProducts,
            'totalTransaction' => $totalTransaction,
            'status'           => $status,
        ];

        return view('admin::pages.dashboard.index', $viewData);
    }

    public function revenue(Request $request)
    {
        if ($request->ajax()) {
            $transactions = Transaction::whereRaw(1);

            $month = date('m');
            if ($request->month)
                $month = $request->month;

            $yearQuery = date('Y');
            if ($request->yearQuery)
                $yearQuery = $request->yearQuery;

            if ($request->status) {
                $transactions->where('t_status', $request->status);
            }
            $transactions = $transactions
                ->whereMonth('t_time_process', $month)
                ->select(\DB::raw('sum(t_total_money) as totalMoney'), \DB::raw('DATE(t_time_process) day'))
                ->groupBy('day')
                ->get()->toArray();

            $listDay                     = $this->getListDayInMonth($month);
            $arrRevenueTransactionsMonth = [];

            foreach ($listDay as $day) {
                $total = 0;
                foreach ($transactions as $key => $revenue) {
                    if ($revenue['day'] == $day) {
                        $total = $revenue['totalMoney'];
                        break;
                    }
                }
                $arrRevenueTransactionsMonth[] = (int)$total;
            }

            $transactionsYears = Transaction::whereRaw(1);
            if ($request->status) {
                $transactionsYears->where('t_status', $request->status);
            }

            $transactionsYears = $transactionsYears->select(\DB::raw('sum(t_total_money) as totalMoney'), \DB::raw('YEAR(t_time_process) year'))
                ->groupBy('year')
                ->get()->toArray();


            $dataTransactionsYears = [];
            $collectionTran        = collect($transactionsYears);
            $total                 = $collectionTran->sum('totalMoney');
            foreach ($transactionsYears as $year) {
                $dataTransactionsYears[] = [
                    'name'  => $year['year'],
                    'y'     => ($year['totalMoney'] / $total) * 100,
                    'price' => number_format($year['totalMoney'], 0, ',', '.'),
                ];
            }

            $transactionByAdmin = Transaction::with('admin:id,name')
                ->select(\DB::raw('sum(t_total_money) as totalMoney'), 't_admin_id')
                ->groupBy('t_admin_id')
                ->get()->toArray();

            $dataSale          = [];
            foreach ($transactionByAdmin as $item) {
                $dataSale[] = [
                    'name'  => $item['admin']['name'] ?? '[N\A]',
                    'y'     => (int)$item['totalMoney'],
                    'price' => number_format((int)$item['totalMoney'], 0, ',', '.'),
                ];
            }

            // Các tháng  trong năm

            $transactionMonth       = Transaction::whereYear('t_time_process', $yearQuery)
                ->select(
                    DB::raw('YEAR(t_time_process) as year'),
                    DB::raw('MONTH(t_time_process) as month'),
                    DB::raw('SUM(t_total_money) as totalMoney')
                )
                ->groupBy('month', 'year')
                ->orderBy('year', 'ASC')
                ->orderBy('month', 'ASC')
                ->get();

            $dataMonthByTransaction = [];
            foreach ($transactionMonth as $item) {
                $dataMonthByTransaction[$item['month']] = [
                    'name'  => 'Tháng ' . $item['month'],
                    'y'     => (int)$item['totalMoney'],
                    'price' => number_format((int)$item['totalMoney'], 0, ',', '.'),
                ];
            }

            $newDataMonthByTransaction = [];
            for($i = 1 ; $i <= 12; $i ++)
            {
                if( array_key_exists($i, $dataMonthByTransaction))
                {
                    $newDataMonthByTransaction[] = $dataMonthByTransaction[$i];
                }else{
                    $newDataMonthByTransaction[] = [
                        'name'  => 'Tháng ' . $i,
                        'y'     => 0,
                        'price' => 0,
                    ];
                }
            }
            return response()->json([
                'listDay'                     => json_encode($listDay),
                'transactionsYears'           => json_encode($dataTransactionsYears),
                'arrRevenueTransactionsMonth' => json_encode($arrRevenueTransactionsMonth),
                'dataSale'                    => json_encode($dataSale),
                'transactionMonth'            => json_encode($newDataMonthByTransaction),
            ]);
        }
    }

    public function getListDayInMonth($month = 0)
    {
        $arrayDay = [];

        if (!$month)
            $month = date('m');

        $year = date('Y');
        // Lấy tất cả các ngày trong tháng
        for ($day = 1; $day <= 31; $day++) {
            $time = mktime(12, 0, 0, $month, $day, $year);
            if (date('m', $time) == $month)
                $arrayDay[] = date('Y-m-d', $time);
        }

        return $arrayDay;
    }
}
