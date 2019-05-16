<?php

namespace App\Http\Middleware;

use Closure;

class VerifyPhone
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
        if(!$request->user()->hasVerifiedPhone()) {
            return redirect('/verify');
        }
        return $next($request);
    }
}
