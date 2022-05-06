<?php

namespace TrungPhuNA\Api\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Entities\Contact;
use TrungPhuNA\Api\HelpersClass\ResponseService;

class ApiContactController extends Controller
{
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data               = $request->all();
            $data['created_at'] = Carbon::now();
            $contact            = Contact::create($data);

            $results            = [
                'contact' => $contact
            ];

            DB::commit();

            return response()->json(ResponseService::getSuccess($results));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("API: " . $exception->getMessage());
            return response()->json(ResponseService::getError("Có lỗi xẩy ra, xin vui lòng kiểm tra lại"));
        }
    }
}
