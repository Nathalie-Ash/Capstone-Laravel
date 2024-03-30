<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showPage1()
    {
        return view('signup');
    }

    public function handlePage1(Request $request)

    {     $incomingFields = $request->all();
        logger($incomingFields); // Log the incoming data
        
        $validatedData = $request->validate([
            'name' => ['required', 'max:30'],
            'email' => ['required', 'email', 'regex:/^[a-z]+\.[a-z]+@lau\.edu$/'],
            'username' => ['required', 'min:3', 'max:30'],
            'password' => ['required', 'min:8', 'max:30', 'confirmed'], // Ensure password confirmation field is named password_confirmation
        ]);

        // Store validated data from page 1 in session
        $request->session()->put('signup_data', $validatedData);

        return redirect()->route('sign2'); // Redirect to page 2 for additional signup data
    }

    public function showPage2(Request $request)
    {
        // Retrieve data from session (page 1 data)
        $signupData = $request->session()->get('signup_data');

        // Check if data exists in session
        if (!$signupData) {
            // Handle case when data is missing
            return redirect()->route('signup')->with('error', 'Please fill out page 1 form first');
        }

        return view('sign2', compact('signupData'));
    }

    public function register(Request $request)
    {
        // Retrieve data from session (page 1 data)
        $signupData = $request->session()->get('signup_data');
        logger($signupData);
        // Check if data exists in session
        if (!$signupData) {
            // Handle case when data is missing
            return redirect()->route('signup')->with('error', 'Please fill out page 1 form first');
        }

        // Validate additional data from page 2
        $validatedData = $request->validate([
            'birthdate' => ['required'], 
            'sexualorientation' => ['required'], 
            'gender' => ['required'], 
        ]);

        // Merge page 1 and page 2 data
        $userData = array_merge($signupData, $validatedData);
        logger($userData);
        // Create new user
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'username' => $userData['username'],
            'password' => Hash::make($userData['password']),
            'birthdate' => $userData['birthdate'], 
            'sexualorientation' => $userData['sexualorientation'], 
            'gender' => $userData['gender'], 
        ]);

        // Clear signup data from session
        $request->session()->forget('signup_data');

        return "User created successfully!";
    }
}
