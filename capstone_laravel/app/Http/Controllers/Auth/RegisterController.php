<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/step1';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function registered(Request $request, $user)
    {
        $request->session()->put('username', $user->username);
        $request->session()->put('expires_at', now()->addMinutes(30));
        return redirect()->route('verification.notice');
    }


    protected function showPage1()
    {
        return view('signup');
    }

    protected function handlePage1(Request $request)
    {
    
        $validatedData = $request->validate([
            'name' => ['required', 'max:30'],
            'email' => ['required', 'email', 'regex:/^[a-z]+\.[a-z]+(?:[0-9]+)?@lau\.edu$/'],
            'username' => ['required', 'min:3', 'max:30'],
            'password' => ['required', 'min:8', 'max:30', 'confirmed'],
        ]);
        logger($validatedData['email']);
        $request->session()->put('signup_email', $validatedData['email']);

        $request->session()->put('signup_data', $validatedData);

        return redirect()->route('sign2');
    }

    protected function showPage2(Request $request)
    {
        $signupData = $request->session()->get('signup_data');
        $signupEmail = $request->session()->get('signup_email');

        if (!$signupData || !$signupEmail) {
            return redirect()->route('signup')->with('error', 'Please fill out page 1 form first');
        }

        return view('sign2', compact('signupData', 'signupEmail'));
    }

    public function register(Request $request)
    {
        $signupData = $request->session()->get('signup_data');

        if (!$signupData) {
            return redirect()->route('signup')->with('error', 'Please fill out page 1 form first');
        }

        $validatedData = $request->validate([
            'birthdate' => ['required'],
            'sexualorientation' => ['required'],
            'gender' => ['required'],
        ]);

        logger($validatedData);
        $birthdate = date('Y-m-d', strtotime($validatedData['birthdate']));

        $userData = array_merge($signupData, $validatedData);
        $userData['birthdate'] = $birthdate;

        logger($userData);

        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'username' => $userData['username'],
            'password' => Hash::make($userData['password']),
            'birthdate' => $userData['birthdate'],
            'sexualorientation' => $userData['sexualorientation'],
            'gender' => $userData['gender'],
            'is_admin' => false
        ]);

        if ($user) {
            event(new Registered($user));
            Auth::login($user);
            $request->session()->forget('signup_data');
            $user->sendEmailVerificationNotification(); 

            return redirect()->route('verification.notice');
        } else {
            return 'user nu uh';
        }
    }


    public function redirectTo()
    {
        return route('steps');
    }
    
    public function checkUsername(Request $request)
    {
        $username = $request->username;
        $user = User::where('username', $username)->first();
        if ($user) {
            return response()->json('taken');
        } else {
            return response()->json('available');
        }
    }
    public function checkEmail(Request $request)
{
    $email = $request->email;
    $user = User::where('email', $email)->first();
    if ($user) {
        return response()->json('taken');
    } else {
        return response()->json('available');
    }
}

}
