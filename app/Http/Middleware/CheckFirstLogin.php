<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if (!Auth::user()->active) {
            return redirect()->route('admin.getFirstLogin');
        }
        return $next($request);
    }
}
