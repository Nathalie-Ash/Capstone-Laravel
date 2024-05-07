<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserPreferences;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PreferencesController extends Controller
{
    public function showStep1(Request $request)
    {
        return view('step1');
    }

    public function storeStep1(Request $request)
    {
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
        $step1Data = $request->session()->get('user_preferences.step1');
        if (!$step1Data) {
            return redirect()->route('step1')->with('error', 'Please fill out page 1 form first');
        }

        return view('step2', compact('step1Data'));
    }

    public function storeStep2(Request $request)
    {
        $validatedData = $request->validate([
            'outdoorItem1' => 'required',
            'outdoorItem2' => 'required',
            'outdoorItem3' => 'required',
            'indoorItem1' => 'required',
            'indoorItem2' => 'required',
            'indoorItem3' => 'required',

        ]);

        $request->session()->put('user_preferences.step2', $validatedData);
        logger($validatedData);

        return redirect()->route('step3');
    }


    public function showStep3(Request $request)
    {
        $step2Data = $request->session()->get('user_preferences.step2');
        if (!$step2Data) {
            return redirect()->route('step2')->with('error', 'Please fill out page 2 form first');
        }

        return view('step3', compact('step2Data'));
    }

    public function storeStep3(Request $request)
    {
        $validatedData = $request->validate([
            'musicItem1' => 'required',
            'musicItem2' => 'required',
            'musicItem3' => 'required',
            'movieItem1' => 'required',
            'movieItem2' => 'required',
            'movieItem3' => 'required',
            'description' => 'required|max:255',
        ]);

        $request->session()->put('user_preferences.step3', $validatedData);
        logger($validatedData);

        return redirect()->route('step4');
    }


    public function showStep4(Request $request)
    {
        $step3Data = $request->session()->get('user_preferences.step3');
        if (!$step3Data) {
            return redirect()->route('step3')->with('error', 'Please fill out page 3 form first');
        }

        return view('step4', compact('step3Data'));
    }



    public function storeStep4(Request $request)
    {
        $validatedData = $request->validate([
            'timetable_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'avatar' => 'nullable|file|mimes:png,jpg,jpeg|max:2048'
        ]);
        if ($request->hasFile('timetable_path')) {
            $timetableFile = $request->file('timetable_path');
            $timetableFileName = time() . '.' . $timetableFile->extension();
            $timetableFile->move(public_path('timetables'), $timetableFileName);
            $validatedData['timetable_path'] = 'timetables/' . $timetableFileName;
        }
        if ($request->hasFile('avatar')) {
            $avatarFile = $request->file('avatar');
            $avatarFileName = time() . '.' . $avatarFile->extension();
            $avatarFile->move(public_path('avatars'), $avatarFileName);
            $validatedData['avatar'] = 'avatars/' . $avatarFileName;
        }
        $request->session()->put('user_preferences.step4', $validatedData);
        $step1Data = $request->session()->get('user_preferences.step1');
        $step2Data = $request->session()->get('user_preferences.step2');
        $step3Data = $request->session()->get('user_preferences.step3');
        $userData = array_merge($step1Data, $step2Data, $step3Data, $validatedData);
        $user = Auth::user();
        $userId = $user->id;
        $userData['user_id'] = $userId;
        UserPreferences::create($userData);
        $request->session()->put('success', 'Preferences submitted successfully!');
        return redirect()->route('dashboard');
    }

    public function goToDashboard()
    {
        return view('dashboard');
    }



    public function __construct()
    {
        $this->middleware('auth');
        $this->displayProfile2();
    }

    public function displayProfile2()
    {
        $userData = UserPreferences::where('user_id', auth()->id())->first();
        return view('profile2', compact('userData'));
    }

    public function saveUserData(Request $request)
    {
        $updatedData = $request->all();
        $user = UserPreferences::where('user_id', auth()->id())->first();
        $user->update($updatedData);
        return response()->json(['message' => 'User data saved successfully.']);
    }

    public function updateUserData(Request $request)
    {
        $validatedData = $request->validate([
            'timetable_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'avatar' => 'nullable|file|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->hasFile('timetable_path')) {
            $timetableFile = $request->file('timetable_path');
            $timetableFileName = time() . '.' . $timetableFile->extension();
            $timetableFile->move(public_path('timetables'), $timetableFileName);
            $validatedData['timetable_path'] = 'timetables/' . $timetableFileName;
        }

        if ($request->hasFile('avatar')) {
            $avatarFile = $request->file('avatar');
            $avatarFileName = time() . '.' . $avatarFile->extension();
            $avatarFile->move(public_path('avatars'), $avatarFileName);
            $validatedData['avatar'] = 'avatars/' . $avatarFileName;
        }

        $user = UserPreferences::where('user_id', auth()->id())->first();
        $user->update($validatedData);

        return response()->json(['message' => 'User data saved successfully.']);
    }
}
