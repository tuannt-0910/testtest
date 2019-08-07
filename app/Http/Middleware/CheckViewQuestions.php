<?php

namespace App\Http\Middleware;

use Closure;

class CheckViewQuestions
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
        if ($request->user()->can('view-questions')) {
            return $next($request);
        }
        return redirect()->route('Admin.home');
    }
}
