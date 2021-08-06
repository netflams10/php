<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Test
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
        // Test for web 
        session()->flash('test', 'test-key-test-middleware');
        // For setting api
        dd('test-key-test-middleware-for-specific -route');
        return $next($request);
    }
}
