<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMultiAuth
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
        if (\Auth::guard('api')->check()) {
            return $next($request);
        }
        abort(401, 'Not authenticated');
    }
}