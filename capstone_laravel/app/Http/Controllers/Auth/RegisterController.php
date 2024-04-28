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
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

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

    // /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\Models\User
    //  */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    
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