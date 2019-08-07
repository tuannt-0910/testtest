<?php

namespace App\Http\Middleware;

use Closure;

class CheckViewTestResult
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
        if ($request->user()->can('view-result')) {
            return $next($request);
        }

        return redirect()->route('client.home');
    }
}
