<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class loginSessionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has("User")) {
            return redirect("/")->with('fakeLoginAttempt', 'Fake Login Attempt Detected');
        }
        return $next($request);
    }
}
