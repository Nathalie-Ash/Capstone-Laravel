<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('login'); // Assuming your custom login view is located at resources/views/auth/login.blade.php
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
            // Validate the form data
            $request->validate([
                $this->username() => 'required|string',
                'password' => 'required|string',
            ]);
    
            // Attempt to authenticate the user
            if (Auth::attempt($this->credentials($request))) {
                // Authentication passed
                return $this->sendLoginResponse($request);
            } else {
                // Authentication failed
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
            Auth::logout(); // Log the user out
            $request->session()->invalidate(); // Invalidate the session
            $request->session()->regenerateToken(); // Regenerate the CSRF token
            return redirect('/'); // Redirect to the home page or any other page after logout
        }
    }
    
