<?php

namespace TrungPhuNA\Admin\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminUserRequest;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $users    = User::orderByDesc('id')
            ->paginate(20);
        $viewData = [
            'users' => $users
        ];

        return view('admin::pages.user.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.user.create');
    }

    public function modalAdd(Request $request)
    {
        if ($request->ajax()) {
            try {
                $viewData = [

                ];

                $html = view('admin::pages.ecommerce.transaction.include._inc_popup_add_user', $viewData)->render();
                return response()->json([
                    'status' => 200,
                    'html'   => $html
                ]);
            } catch (\Exception $exception) {
                Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
            }
        }
    }

    public function store(AdminUserRequest $request)
    {
        try {

            $data             = $request->except('_token');
            $data['password'] = Hash::make(123456789);
            $data['meta']     = json_encode($request->meta);
            if (!$request->name)
            {
                $data['name'] = explode("@", $request->email)[0] ?? null;
            }

            $user             = User::create($data);

            if ($request->ajax()) {
                return response()->json([
                    'status' => 200
                ]);
            }

            return redirect()->route('get_admin.user.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $user     = User::find($id);
        $viewData = [
            'user' => $user
        ];

        return view('admin::pages.user.update', $viewData);
    }

    public function info(Request $request)
    {
        if ($request->ajax()) {
            $id   = $request->id;
            $user = User::find($id);
            if (!$user) {
                return response()->json([
                    'code'    => 404,
                    'message' => 'Không tồn tại User trên hệ thống'
                ]);
            }

            $html = view('admin::pages.ecommerce.transaction.include._inc_user_info', compact('user'))->render();
            return response()->json([
                'status' => 200,
                'user'   => $user,
                'html'   => $html
            ]);
        }
    }

    public function update(AdminUserRequest $request, $id)
    {
        try {

            $data = $request->except('_token');
            $user = User::find($id)->update($data);

            return redirect()->route('get_admin.user.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) $user->delete();

        return redirect()->back();
    }
}
