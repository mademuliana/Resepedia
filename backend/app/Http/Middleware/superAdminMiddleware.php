<?php

namespace App\Http\Middleware;

use Closure;

class superAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if ($request->user() && $request->user()->role > '3')
        {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
