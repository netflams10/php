<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Administrator
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
        if (in_array(auth()->user()->email, config('app.administrator'))) {
            dd('you are an administrator');
        } else {
            dd("you do not have access!");
        }
        return $next($request);
    }
}
