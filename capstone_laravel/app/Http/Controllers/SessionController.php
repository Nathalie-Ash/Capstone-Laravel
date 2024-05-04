<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class SessionController extends Controller
{
    public function setSession(Request $request)
    {
        $request->session()->put('username',  Auth::user()->username);
        $request->session()->put('expires_at', now()->addMinutes(30)); 
        return "Session variable with timeout has been set.";
    }

    public function getSession(Request $request)
    {
        if ($request->session()->has('expires_at') && now()->gt(session('expires_at'))) {
     
            Session::flush(); 
            Auth::logout();
            return redirect('/login')->with('status', 'Your session has expired. Please log in again.');
        } else {
            $value = $request->session()->get('username');
            return $value;
        }
    }
}
