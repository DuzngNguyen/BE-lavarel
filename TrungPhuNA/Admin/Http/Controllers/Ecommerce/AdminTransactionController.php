<?php

namespace TrungPhuNA\Admin\Http\Controllers\Ecommerce;

use App\Imports\ImportTransactionExcel;
use App\Jobs\JobEmailSuccessOrder;
use App\Jobs\JobNotificationTelegram;
use App\Models\User;
use App\Service\RenderMetaSeoService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Ecommerce\Entities\Order;
use TrungPhuNA\Ecommerce\Entities\Product;
use TrungPhuNA\Ecommerce\Entities\Transaction;
use TrungPhuNA\Setting\Entities\Admin;
use TrungPhuNA\Setting\Helpers\FilterHelper;

class AdminTransactionController extends Controller
{
    public function index(Request $request)
    {

        $admins = Admin::all();
        $admin = Auth::guard('admins')->user()->hasPermissionTo('full');
        $transactions = Transaction::with('orders', 'user:id,name', 'admin:id,name');
        if ($request->sale_id && !$admin) {
            $transactions->where('t_admin_id', $request->sale_id);
        }

        if (!$admin)
            $transactions->where('t_admin_id', get_data_user('admins'));

        if ($request->id) {
            $id = get_numerics($request->id);
            $transactions->where('id', $id);
        }

        if ($request->e)
            $transactions->where('t_email', 'like', '%' . $request->e . '%');

        if ($request->p)
            $transactions->where('t_phone', 'like', '%' . $request->p . '%');

        if ($request->status)
            $transactions->where('t_status', $request->status);

        if ($request->time) {
            $time = FilterHelper::getStartEndTime($request->time, ['ymd' => true]);
            $transactions->whereBetween('t_time_process', $time);
        } else {
            $time = [
                "start" => "2022-01-01",
                "stop" => date('Y-m-d')
            ];
            $transactions->whereBetween('t_time_process', $time);
        }

        $transactionTotal      = $transactions;
        $transactionTotalMoney = $transactionTotal->sum('t_total_money');

        $transactions = $transactions->orderByDesc('id')
            ->paginate(40);

        RenderMetaSeoService::render([
            'title' => 'Thông tin đơn hàng',
        ]);

        $status = (new Transaction())->getStatus();

        $banks = config('transaction.banks');

        $viewData = [
            'transactions'          => $transactions,
            'admins'                => $admins,
            'query'                 => $request->query(),
            'status'                => $status,
            'banks'                 => $banks,
            'transactionTotalMoney' => $transactionTotalMoney
        ];

        if ($request->ajax()) {
            $html = view('admin::pages.ecommerce.transaction.include._inc_list', $viewData)->render();
            return response()->json([
                'status' => 200,
                'html'   => $html
            ]);
        }

        return view('admin::pages.ecommerce.transaction.index', $viewData);
    }

    public function postImport(Request $request)
    {
        if ($request->files) {
            \Excel::import(new ImportTransactionExcel($request), request()->file('files'));
        }
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            try {
                $users       = User::all();
                $status      = (new Transaction())->getStatus();
                $changes     = (new Transaction())->getChanges();
                $getSubjects = (new Transaction())->getSubjects();
                $viewData    = [
                    'users'       => $users,
                    'status'      => $status,
                    'changes'     => $changes,
                    'getSubjects' => $getSubjects
                ];


                $html = view('admin::pages.ecommerce.transaction.include._inc_popup_add_transaction', $viewData)->render();
                return response()->json([
                    'status' => 200,
                    'html'   => $html
                ]);
            } catch (\Exception $exception) {
                Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
            }
        }
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $dataTransaction                  = $request->except('_token', 'products');
            $dataTransaction['created_at']    = Carbon::now();
            $dataTransaction['t_user_id']     = $request->t_user_id;
            $dataTransaction['t_total_money'] = str_replace(',', '', $request->t_total_money);
            $dataTransaction['t_admin_id']    = get_data_user('admins');
            $dataTransaction['t_meta']        = json_encode($request->t_meta);
            $admin = Auth::guard('admins')->user()->hasPermissionTo('full');
            if (!$admin) {
                $dataTransaction['t_status'] = Transaction::STATUS_DEFAULT;
            }
            $transaction                      = Transaction::create($dataTransaction);
            $total                            = 0;
            if ($transaction) {
                $ids      = $request->ids;
                $products = Product::whereIn('id', (array)$ids)->get();
                $qtys     = $request->qtys ?? [];
                foreach ($products as $key => $item) {
                    if ($item->pro_number && $item->pro_number > ($qtys[$key] ?? 1)) {
                        Order::create([
                            'o_transaction_id' => $transaction->id,
                            'o_action_id'      => $item->id,
                            'o_qty'            => $qtys[$key] ?? 1,
                            'o_price'          => $item->pro_price,
                            'o_total_price'    => ($qtys[$key] ?? 1) * $item->pro_price,
                            'created_at'       => Carbon::now()
                        ]);
                        $total += ($qtys[$key] ?? 1) * $item->pro_price;

                        $item->pro_number -= $qtys[$key] ?? 1;
                        $item->pro_pay    += 1;
                        $item->save();

                    }
                }

                if ($request->t_status = Transaction::STATUS_TRANSFER || $request->t_status = Transaction::STATUS_SUCCESS) {
                    $options = [
                        'phone'       => $transaction->t_phone,
                        'transaction' => $transaction
                    ];
//                    dispatch(new JobNotificationTelegram('[Đơn hàng được tạo từ CMS]', $options));
//                    dispatch(new JobEmailSuccessOrder($transaction));
                }
            }

            if ($total) {
                $transaction->t_total_money = $total;
                $transaction->save();
            }

            return response()->json([
                'status' => 200,
                'data'   => $transaction
            ]);
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $transaction = Transaction::find($id);
            $users       = User::all();
            $status      = (new Transaction())->getStatus();
            $changes     = (new Transaction())->getChanges();
            $getSubjects = (new Transaction())->getSubjects();

            if ($transaction) {
                $products = Product::whereHas('orders', function ($query) use ($transaction) {
                    $query->where('o_transaction_id', $transaction->id);
                })->get();
            }

            $orders = Order::where('o_transaction_id', $transaction->id)
                    ->pluck('o_qty', 'o_action_id')
                    ->toArray() ?? [];

            $meta     = json_decode($transaction->t_meta, true);
            $viewData = [
                'users'       => $users,
                'transaction' => $transaction,
                'orders'      => $orders,
                'getSubjects' => $getSubjects,
                'status'      => $status,
                'id'          => $id,
                'changes'     => $changes,
                'products'    => $products ?? [],
                'meta'        => $meta
            ];

            $html = view('admin::pages.ecommerce.transaction.include._inc_popup_add_transaction', $viewData)->render();
            return response()->json([
                'status' => 200,
                'html'   => $html
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $transaction                      = Transaction::find($id);
            $statusOld                        = $transaction->t_status;
            $dataTransaction                  = $request->except('_token', 'products');
            $dataTransaction['created_at']    = Carbon::now();
            $dataTransaction['t_user_id']     = $request->t_user_id;
            $dataTransaction['t_total_money'] = str_replace(',', '', $request->t_total_money);

            $admin = Auth::guard('admins')->user()->hasPermissionTo('full');
            if (!$admin) {
                unset($dataTransaction['t_status']);
            }

            $update                           = $transaction->fill($dataTransaction)->save();
            $total                            = 0;
            if ($update) {

                $transaction = Transaction::find($id);
                if (($request->t_status = Transaction::STATUS_TRANSFER || $request->t_status = Transaction::STATUS_SUCCESS) && $statusOld != $transaction->t_status) {
                    $options = [
                        'phone'       => $transaction->t_phone,
                        'transaction' => $transaction
                    ];
//                    dispatch(new JobNotificationTelegram('[Cập nhật đơn hàng từ CMS]', $options));
                }

                $ids      = $request->ids;
                $products = Product::whereIn('id', (array)$ids)->get();
                $qtys     = $request->qtys ?? [];

                $orders = Order::where('o_transaction_id', $id)->get();
                foreach ($orders as $order) {
                    Product::where('id', $order->o_action_id)
                        ->increment('pro_number', $order->o_qty);

                    Product::where('id', $order->o_action_id)
                        ->decrement('pro_pay');

                    $order->delete();
                }

                foreach ($products as $key => $item) {
                    $product = Product::find($id);
                    if (isset($product->pro_number)) {
                        Order::create([
                            'o_transaction_id' => $id,
                            'o_action_id'      => $item->id,
                            'o_qty'            => $qtys[$key] ?? 1,
                            'o_price'          => $item->pro_price,
                            'o_total_price'    => ($qtys[$key] ?? 1) * $item->pro_price,
                            'created_at'       => Carbon::now()
                        ]);
                        $total += ($qtys[$key] ?? 1) * $item->pro_price;

                        $item->pro_number -= $qtys[$key] ?? 1;
                        $item->pro_pay    += 1;
                        $item->save();
                    }
                }
            }
            if ($total) {
                Log::info("-- Transaction: " . json_encode($transaction));
                $transaction->t_total_money = $total;
                $transaction->save();
            }

            return response()->json([
                'status' => 200
            ]);
        }
    }

    public function delete(Request $request, $id)
    {
        Transaction::find($id)->delete();
        Order::where('o_transaction_id', $id)->delete();
    }

    /**
     * @param Request $request
     * Xoá nhiều theo ids
     */
    public function deletes(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->ids;
            if (!$ids) {
                return response()->json([
                    'status'  => 200,
                    'message' => 'Không có dữ liệu xử lý'
                ]);
            }

            foreach ($ids as $id) {
                Transaction::find($id)->delete();
                Order::where('o_transaction_id', $id)->delete();
            }
            return response()->json([
                'status'  => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }
    }
}
