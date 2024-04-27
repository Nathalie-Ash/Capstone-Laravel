<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User; // Adjust the path if needed

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

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

        // Check if the user is the hardcoded admin
        if ($request->input('username') === 'admin' && $request->input('password') === 'adminpassword') {
            // Create a fake user object to represent the admin
            $admin = new User();
            $admin->username = 'admin';
            
            // Log in the admin user
            Auth::login($admin);
            
            // Redirect the admin user to /admin
            return redirect('/admin');
        }

        // Attempt to authenticate the user against the database
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

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        // Redirect admin to /admin
        if (Auth::user()->username === 'admin') {
            return redirect('/admin');
        }

        // Redirect regular users to $redirectTo
        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return redirect('/'); // Redirect to the home page or any other page after logout
    }
}
