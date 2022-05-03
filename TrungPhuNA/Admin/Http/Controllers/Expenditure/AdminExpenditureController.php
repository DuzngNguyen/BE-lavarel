<?php

namespace TrungPhuNA\Admin\Http\Controllers\Expenditure;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Entities\Expenditure;
use TrungPhuNA\Setting\Helpers\FilterHelper;

class AdminExpenditureController extends Controller
{
    public function index(Request $request)
    {
        $expenditures = Expenditure::with('admin:id,name');

        if ($request->type)
            $expenditures->where('e_type', $request->type);


        if ($request->time) {
            $time = FilterHelper::getStartEndTime($request->time,['ymd' => true]);
            $expenditures->whereBetween('e_date', $time);
        }

        $expendituresTotal      = $expenditures;
        $expendituresTotalMoney = $expendituresTotal->sum('e_price');

        $expenditures = $expenditures->orderByDesc('id')
            ->paginate(20);


        $types = (new Expenditure())->getType();

        $viewData = [
            'expenditures'           => $expenditures,
            'types'                  => $types,
            'expendituresTotalMoney' => $expendituresTotalMoney,
            'query'                  => $request->query()
        ];

        return view('admin::pages.expenditure.expenditure.index', $viewData);
    }

    public function create()
    {
        $type       = (new Expenditure())->getType();
        $categories = (new Expenditure())->getCategories();

        $viewData = [
            'type'       => $type,
            'categories' => $categories
        ];

        return view('admin::pages.expenditure.expenditure.create', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token', 'e_price');
            $data['e_price']    = str_replace(',', '', $request->e_price);
            $data['created_at'] = Carbon::now();
            $data['e_admin_id'] = get_data_user('admins');
            $expenditure        = Expenditure::create($data);
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $type       = (new Expenditure())->getType();
        $categories = (new Expenditure())->getCategories();

        $expenditure = Expenditure::find($id);

        $viewData = [
            'type'        => $type,
            'categories'  => $categories,
            'expenditure' => $expenditure
        ];

        return view('admin::pages.expenditure.expenditure.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        try {
            $data               = $request->except('_token', 'e_price');
            $data['e_price']    = str_replace(',', '', $request->e_price);
            $data['created_at'] = Carbon::now();
            $expenditure        = Expenditure::find($id)->update($data);
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        Expenditure::find($id)->delete();
        return redirect()->back();
    }
}
