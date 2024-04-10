<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserPreferences;
use Illuminate\Support\Facades\Log;

class PreferencesController extends Controller
{
    public function showStep1(Request $request)
    {
        if (!$request->session()->has('user_id')) {
            return redirect()->route('signup'); // Redirect to signup page if user ID is present
        }

        return view('step1');
    }
    public function storeStep1(Request $request)
    {

        $incomingFields = $request->all();
        logger($incomingFields); // Log the incoming data

        $validatedData = $request->validate([
            'school' => 'required',
            'major' => 'required',
            'minor',
            'campus' => 'required',
        ]);


        $request->session()->put('user_preferences.step1', $validatedData);

        return redirect()->route('step2');
    }

    public function showStep2(Request $request)
    {

        // Retrieve data from session
        $step1Data = $request->session()->get('user_preferences.step1');
        if (!$step1Data) {
            // Handle case when data is missing
            return redirect()->route('step1')->with('error', 'Please fill out page 1 form first');
        }

        return view('step2', compact('step1Data'));
    }

    public function storeStep2(Request $request)
    {

        // Validate the incoming form data
        $validatedData = $request->validate([
            'outdoorItem1' => 'required',
            'outdoorItem2' => 'required',
            'outdoorItem3' => 'required',
            'indoorItem1' => 'required',
            'indoorItem2' => 'required',
            'indoorItem3' => 'required',

        ], [
            // Custom error messages if validation fails
            'indoorItem1.required' => 'Please select Activity 1 for indoor activities.',
            'indoorItem2.required' => 'Please select Activity 2 for indoor activities.',
            'indoorItem3.required' => 'Please select Activity 3 for indoor activities.',
            'outdoorItem1.required' => 'Please select Activity 1 for outdoor activities.',
            'outdoorItem2.required' => 'Please select Activity 2 for outdoor activities.',
            'outdoorItem3.required' => 'Please select Activity 3 for outdoor activities.',
        ]);

        // Process the validated data as needed, for example, you can store it in the session
        $request->session()->put('user_preferences.step2', $validatedData);
        logger($validatedData);

        // Redirect to the next step or any other action
        return redirect()->route('step3');
    }


    public function showStep3(Request $request)
    {
        // Retrieve data from session
        $step2Data = $request->session()->get('user_preferences.step2');
        if (!$step2Data) {
            // Handle case when data is missing
            return redirect()->route('step2')->with('error', 'Please fill out page 2 form first');
        }

        return view('step3', compact('step2Data'));
    }

    public function storeStep3(Request $request)
    {

        // Validate the incoming form data
        $validatedData = $request->validate([
            'musicItem1' => 'required',
            'musicItem2' => 'required',
            'musicItem3' => 'required',
            'movieItem1' => 'required',
            'movieItem2' => 'required',
            'movieItem3' => 'required',
            'description' => 'required',
        ]);

        // Process the validated data as needed, for example, you can store it in the session
        $request->session()->put('user_preferences.step3', $validatedData);
        logger($validatedData);

        // Redirect to the next step or any other action

        return redirect()->route('step4');
    }


    public function showStep4(Request $request)
    {
        // Retrieve data from session
        $step3Data = $request->session()->get('user_preferences.step3');
        if (!$step3Data) {
            // Handle case when data is missing
            return redirect()->route('step3')->with('error', 'Please fill out page 3 form first');
        }

        return view('step4', compact('step3Data'));
    }



    public function storeStep4(Request $request)
    {
        $userId = $request->session()->get('user_id');
        // Validate the incoming form data
        $validatedData = $request->validate([
            'displayName' => 'required',
        ]);

        $request->session()->put('user_preferences.step4', $validatedData);

        $step1Data = $request->session()->get('user_preferences.step1');
        $step2Data = $request->session()->get('user_preferences.step2');
        $step3Data = $request->session()->get('user_preferences.step3');

        // Merge all the data
        $userData = array_merge($step1Data, $step2Data, $step3Data, $validatedData);

        // Set the user ID as the first element in the array
        $userData['user_id'] = $userId;
        logger($userData);

        // Store data in the database
        UserPreferences::create($userData);

        // Optionally, you can flash a success message to the session
        $request->session()->put('success', 'Preferences submitted successfully!');

        // Redirect to any other action
        // fix this tmrw 
        return redirect()->route('dashboard');
    }
    public function goToDashboard()
    {

        return view('dashboard');
    }



    public function __construct()
    {
        $this->middleware('auth'); // Assuming authentication is required for profile1 page
        $this->displayProfile2(); // Call the displayProfile1 method automatically
    }

    public function displayProfile2()
    {
        // Retrieve user data from the database
        $userData = User::find(auth()->id());

        // Render the profile1 view with user data
        return view('profile2', compact('userData'));
    }
}
