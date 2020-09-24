<?php

namespace App\Http\Middleware;

use Closure;

class adminOrUser
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
        if(Auth()->guard('web')->check() || Auth()->guard('admin')->check())
        return $next($request);
        return redirect()->route('login');
    }

}
