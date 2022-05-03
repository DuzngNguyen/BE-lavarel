<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 5/19/21 .
 * Time: 2:29 PM .
 */

namespace App\Http\Middleware;


use App\Models\LogRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogRouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public $start = 0;
    public $end = 0;

    public function handle($request, \Closure $next)
    {
        $this->start = microtime(true);
        $response    = $next($request);

        try{
            $this->logRequest($request, $response);
        }catch (\Exception $exception)
        {

        }

        return $response;
    }

    protected function logRequest($request, $response)
    {
        if (app()->environment('local')) {
            $log = [
                'url'          => $request->getUri(),
                'method'       => $request->getMethod(),
                'request_body' => json_encode($request->all()),
                'ip'           => $request->getClientIp(),
                'auth'         => json_encode([
                    'name'  => get_data_user('admins', 'name'),
                    'email' => get_data_user('admins', 'email')
                ]),
                'status'       => $response->getStatusCode(),
                'created_at'   => Carbon::now()
            ];

            $this->end       = microtime(true);
            $log = LogRequest::create($log);
            if($log) {
                $log->duration = number_format($this->end - $this->start, 3);
                $log->save();
            }
        }
    }
}
