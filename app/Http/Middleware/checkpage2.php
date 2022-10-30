<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkpage2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth('web')->check()){
            dd('404 not found');
        }
        return $next($request);
    }
}
