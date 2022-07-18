<?php

namespace App\Http\Middleware;

use App\Jobs\LogJob;
use Closure;
use Illuminate\Http\Request;

class RequestLogMiddleware
{
    /**
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $time1 = microtime(true);
        $response = $next($request);
        $time2 = microtime(true);
        $user_id = $request->user()->id ?? 0;
        //通过中间件 记录操作记录
        LogJob::dispatch([
            'url' => $request->fullUrl(),
            'ip_address' => $request->ip(),
            'user_id' => $user_id,
            'method' => $request->method(),
            'header' => json_encode($request->header()),
            'param' => $request->all(),
            'response' => $response->getContent(),
            'time' => sprintf('%.4f', ($time2 - $time1)).'秒',

        ]);

        return $response;
    }
}
