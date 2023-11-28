<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginClient
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
        if(!session()->has('is_login') && !session()->has('user_login'))
        return redirect()->route('account_login');
        return $next($request);
    }
}
