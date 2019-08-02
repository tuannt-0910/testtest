<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Config;

class CheckFirstLogin
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
        if (Auth::user()->active == Config::get('constant.not_active')) {
            return redirect()->route('admin.getFirstLogin');
        }

        return $next($request);
    }
}
