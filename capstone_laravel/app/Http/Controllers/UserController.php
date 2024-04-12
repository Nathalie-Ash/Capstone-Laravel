<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // public function showPage1()
    // {
    //     return view('signup');
    // }

    // public function handlePage1(Request $request)

    // {    
    //     $incomingFields = $request->all();
    //     logger($incomingFields); // Log the incoming data
        
    //     $validatedData = $request->validate([
    //         'name' => ['required', 'max:30'],
    //         'email' => ['required', 'email', 'regex:/^[a-z]+\.[a-z]+@lau\.edu$/'],
    //         'username' => ['required', 'min:3', 'max:30'],
    //         'password' => ['required', 'min:8', 'max:30','confirmed'], // Ensure password confirmation field is named password_confirmation
    //     ]);

    //     // Store validated data from page 1 in session
    //     $request->session()->put('signup_data', $validatedData);

    //     return redirect()->route('sign2'); // Redirect to page 2 for additional signup data
    // }

    // public function showPage2(Request $request)
    // {
    //     // Retrieve data from session (page 1 data)
    //     $signupData = $request->session()->get('signup_data');
    //     //logger($signupData);
    //     // Check if data exists in session
    //     if (!$signupData) {
    //         // Handle case when data is missing
    //         return redirect()->route('signup')->with('error', 'Please fill out page 1 form first');
    //     }

    //     return view('sign2', compact('signupData'));
    // }

    // public function register(Request $request)
    // {
    //     // Retrieve data from session (page 1 data)
    //     $signupData = $request->session()->get('signup_data');
       
    //     if (!$signupData) {
    //         // Handle case when data is missing
    //         return redirect()->route('signup')->with('error', 'Please fill out page 1 form first');
    //     }

    //     // Validate additional data from page 2
    //     $validatedData = $request->validate([
    //         'birthdate' => ['required'], 
    //         'sexualorientation' => ['required'], 
    //         'gender' => ['required'], 
    //     ]);
        
    //     logger($validatedData);
    //     $birthdate = date('Y-m-d', strtotime($validatedData['birthdate']));

    //     // Merge page 1 and page 2 data
    //     $userData = array_merge($signupData, $validatedData);
    //     $userData['birthdate'] = $birthdate;
        
    //     logger($userData);
    //     // Create new user

    //     $user = User::create([
    //         'name' => $userData['name'],
    //         'email' => $userData['email'],
    //         'username' => $userData['username'],
    //         'password' => Hash::make($userData['password']),
    //         'birthdate' => $userData['birthdate'], 
    //         'sexualorientation' => $userData['sexualorientation'], 
    //         'gender' => $userData['gender'], 
    //     ]);

    //     $user = User::where('email', $userData['email'])->first();

    //     if ($user) {
    //         $userId = $user->id;
    //         $request->session()->put('user_id', $userId);
    //         $request->session()->forget('signup_data');

    //     return redirect()->route('steps');
    //     } 
    //     else{
    //         return 'user nu uh';
    //     }
        

    // }

    

    public function __construct()
    {
        $this->middleware('auth'); // Assuming authentication is required for profile1 page
        $this->displayProfile1(); // Call the displayProfile1 method automatically
    }

    public function displayProfile1()
    {
        // Retrieve user data from the database
        $userData = User::find(auth()->id());

        // Render the profile1 view with user data
        return view('profile1', compact('userData'));
    }
    
}
