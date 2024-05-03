<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    // public function showRetrieveAccountForm()
    // {
    //     return view('auth.retrieve');
    // }

    // public function retrieveAccount(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //     ]);
    
    //     $request->user()->sendEmailVerificationNotification(['email' => $request->email]); // Send verification email
    
    //     return back()->with('message', 'Verification link sent!');
    // }
    public function sendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
    
        return redirect()->route('verification.notice');
    }
    

    
}