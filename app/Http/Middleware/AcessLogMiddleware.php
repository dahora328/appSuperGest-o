<?php

namespace App\Http\Middleware;

use App\Models\AcessLog;
use Closure;
use http\Env\Response;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class AcessLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();
        AcessLog::create(['log' => "Ip $ip requisitou a rota $route"]);
        return $next($request);

    }
}
