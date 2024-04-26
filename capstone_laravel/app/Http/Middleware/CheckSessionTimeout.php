<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSessionTimeout
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && ! $request->session()->has('lastActivityTime')) {
            $request->session()->put('lastActivityTime', time());
        }

        $maxIdleTime = config('session.lifetime') * 60;

        if (Auth::check() && $request->session()->has('lastActivityTime') && (time() - $request->session()->get('lastActivityTime') > $maxIdleTime)) {
            Auth::logout();

            return redirect('/');
        }

        $request->session()->put('lastActivityTime', time());

        return $next($request);
    }
}