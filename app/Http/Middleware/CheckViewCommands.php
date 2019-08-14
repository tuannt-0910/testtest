<?php

namespace App\Http\Middleware;

use Closure;

class CheckViewCommands
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
        if ($request->user()->can('view-commands')) {
            return $next($request);
        }

        return redirect()->route('admin.home');
    }
}
