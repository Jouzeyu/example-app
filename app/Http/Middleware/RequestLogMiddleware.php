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
        //通过中间件 记录操作记录
        LogJob::dispatch([
            'url' => $request->path(),
            'request' => $request->all(),
            'response' => $next($request),
            'time' => sprintf('%.4f', ($time2 - $time1)).'秒',
            'method' => $request->method(),
        ]);

        return $response;
    }
}
