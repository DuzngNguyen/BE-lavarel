<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 6/15/21 .
 * Time: 10:15 PM .
 */

namespace App\Http\Middleware;


use Illuminate\Validation\UnauthorizedException;

class PermissionMiddleware
{
    public function handle($request, \Closure $next, $permission)
    {
        if(env('CHECK_LOGIN_ADMIN') === false || env('CHECK_LOGIN_ADMIN') == null)
            return $next($request);

        $admin = \Auth::guard('admins')->user();
        if (!$admin) return  redirect()->route('get_admin.login');

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if ($admin->can($permission)) {
                return $next($request);
            }
        }

        if ($request->ajax())
        {
            return response()->json([
                'status' => 403,
            ]);
        }
        return response()->view('admin::pages.acl.errors.403');
    }
}
