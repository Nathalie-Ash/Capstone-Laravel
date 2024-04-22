<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;
    public $redirectTo = '/step1'; // Redirect to the login page

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function showPage1()
    {
        return view('signup');
    }

    protected function handlePage1(Request $request)
    {
        $incomingFields = $request->all();
        logger($incomingFields);

        $validatedData = $request->validate([
            'name' => ['required', 'max:30'],
            'email' => ['required', 'email', 'regex:/^[a-z]+\.[a-z]+@lau\.edu$/'],
            'username' => ['required', 'min:3', 'max:30'],
            'password' => ['required', 'min:8', 'max:30', 'confirmed'],
        ]);

        $request->session()->put('signup_data', $validatedData);

        return redirect()->route('sign2');
    }
    
    protected function showPage2(Request $request)
    {
        $signupData = $request->session()->get('signup_data');

        if (!$signupData) {
            return redirect()->route('signup')->with('error', 'Please fill out page 1 form first');
        }

        return view('sign2', compact('signupData'));
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
        ]);

        if ($user) {
            Auth::login($user);
            $request->session()->forget('signup_data');

            return redirect()->route('steps');
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

}
