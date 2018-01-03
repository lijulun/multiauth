<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CheckIfIsTeacher
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
            $model = \Auth::guard('api')->user();
            if ($model instanceof Teacher) {
                return $next($request);
            } else {
                abort(403, "Access Denied.");
            }
        }
        abort(401, 'Not authenticated');
    }
}