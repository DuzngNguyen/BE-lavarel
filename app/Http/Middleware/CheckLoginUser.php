<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/27/21 .
 * Time: 4:25 PM .
 */

namespace App\Http\Middleware;


class CheckLoginUser
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
        if (get_data_user('users')) {
            return $next($request);
        }

        return redirect()->route('user_get.login');
    }
}
