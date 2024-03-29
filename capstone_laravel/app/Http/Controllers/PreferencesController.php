<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPreferences;
use Illuminate\Support\Facades\Log;

class PreferencesController extends Controller
{
    public function storeStep1(Request $request)
    {
        $incomingFields = $request->all();
        logger($incomingFields); // Log the incoming data
    
        $validatedData = $request->validate([
            'school'=> 'required',
            'major' => 'required',
            'minor'=> 'required',
            'campus'=> 'required',
        ]);
    
        Log::info('Incoming data:', $incomingFields);

        $request->session()->put('user_preferences.step1', $validatedData);

        return redirect()->route('step2');
    }

    public function showStep2(Request $request)
    {
        // Retrieve data from session
        $step1Data = $request->session()->get('user_preferences.step1');

        return view('step2', compact('step1Data'));
    }

    public function storeStep2(Request $request)
{
    $incomingFields = $request->all();
    //logger($incomingFields);
    // Log the incoming data
    
    // Validate the incoming form data
    $validatedData = $request->validate([
        'indoorItem1Hidden' => 'required',
        'indoorItem2Hidden' => 'required',
        'indoorItem3Hidden' => 'required',
        'outdoorItem1Hidden' => 'required',
        'outdoorItem2Hidden' => 'required',
        'outdoorItem3Hidden' => 'required',
    ], [
        // Custom error messages if validation fails
        'indoorItem1Hidden.required' => 'Please select Activity 1 for indoor activities.',
        'indoorItem2Hidden.required' => 'Please select Activity 2 for indoor activities.',
        'indoorItem3Hidden.required' => 'Please select Activity 3 for indoor activities.',
        'outdoorItem1Hidden.required' => 'Please select Activity 1 for outdoor activities.',
        'outdoorItem2Hidden.required' => 'Please select Activity 2 for outdoor activities.',
        'outdoorItem3Hidden.required' => 'Please select Activity 3 for outdoor activities.',
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

        return view('step3', compact('step2Data'));
    }
}
