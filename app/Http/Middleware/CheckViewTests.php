<?php

namespace App\Http\Middleware;

use Closure;

class CheckViewTests
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
        if ($request->user()->can('view-tests')) {
            return $next($request);
        }
        return redirect()->route('Admin.home');
    }
}
