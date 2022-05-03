<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/27/21 .
 * Time: 4:25 PM .
 */

namespace App\Http\Middleware;


class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if(env('CHECK_LOGIN_ADMIN') === false || env('CHECK_LOGIN_ADMIN') == null)
            return $next($request);

        if (get_data_user('admins')) {
            return $next($request);
        }

        return redirect()->route('get_admin.login');
    }
}
