<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Config;

class PassedFirstLogin
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
        if (Auth::user()->active == Config::get('constant.active')) {
            return redirect()->route('admin.home');
        }

        return $next($request);
    }
}
