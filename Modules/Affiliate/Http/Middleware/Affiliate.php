<?php

namespace Modules\Affiliate\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Affiliate
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
        if (auth()->user()->role()->slug != 'admin' && empty(auth()->user()->affiliateUser()->activeUser()->first())) {
            abort('404');
        }

        return $next($request);
    }
}
