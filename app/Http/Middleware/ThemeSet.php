<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ThemeSet
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
        \Theme::set(config('theme.active', 'default'));

        return $next($request);
    }
}
