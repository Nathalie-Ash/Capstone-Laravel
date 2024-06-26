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

        // Override the username method to use 'username' field instead of 'email'
        public function username()
        {
            return 'username';
        }
    
        // Override the credentials method to specify the credentials used for login
        protected function credentials(Request $request)
        {
            return $request->only($this->username(), 'password');
        }
    
        // Override the login method to customize the authentication logic
        public function login(Request $request)
        {
            $request->validate([
                $this->username() => 'required|string',
                'password' => 'required|string',
            ]);
        
            $credentials = $request->only($this->username(), 'password');
        
            // Attempt to authenticate the user
            if (Auth::attempt($credentials)) {
                if (Auth::user()->deleted) {
                    throw ValidationException::withMessages([
                        $this->username() => ['Your account has been deleted'],
                    ]);
                }
                return $this->sendLoginResponse($request);
            } else {
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.failed')],
                ]);
            }
        }
        
        protected function sendFailedLoginResponse(Request $request)
        {
            $user = \App\Models\User::where($this->username(), $request->{$this->username()})->first();
        
            if ($user && $user->deleted) {
                
                throw ValidationException::withMessages([
                   
                    $this->username() => ['Your account has been deleted'],
                ]);
            } else {
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.failed')],
                ]);
            }
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
        $request->session()->put('username', $user->username);
        $request->session()->put('expires_at', now()->addMinutes(30));
    
        if ($user->is_admin) {
            return redirect('/admin');
        }

        return redirect('/dashboard');
    }

}

