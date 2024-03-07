<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $level
     * @return mixed
     */
    public function handle($request, Closure $next, $level)
    {
        if (Auth::user()->role()->type == 'admin') {
            return $next($request);
        }
        if (json_decode(preference('user_permission'))?->$level == 1) {
            return abort(404);
        }
        return $next($request);
    }
}
