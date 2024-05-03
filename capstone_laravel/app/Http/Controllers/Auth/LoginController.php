<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function username()
    {
        return 'username';
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    public function login(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($this->credentials($request), $remember)) {
            return $this->sendLoginResponse($request);
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); 
    }
    
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            return redirect('/admin');
        }

        return redirect('/dashboard');
    }
}
