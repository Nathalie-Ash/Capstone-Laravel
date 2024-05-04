<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckSessionTimeout
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('expires_at') && now()->gt(session('expires_at'))) {
         
            Session::flush(); 
            Auth::logout();
            return redirect('/login')->with('status', 'Your session has expired. Please log in again.');
        }

     
        if ($request->session()->has('expires_at') && now()->addMinutes(5)->gt(session('expires_at'))) {
            $request->session()->flash('session_about_to_expire', true);
        }

        return $next($request);
    }
}
