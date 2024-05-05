<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userPreferences;
use App\Models\User; 


class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)
            ->where('deleted', false)->get();
        $userImages = [];

        foreach ($users as $user) {
            $userPreferences = UserPreferences::where('user_id', $user->id)->first();
            $userImages[$user->id] = $userPreferences->avatar ?? 'images/default_profile.png';
        }
        $deletedusers = User::where('is_admin', false)
        ->where('deleted', true)->get();
    $deleteduserImages = [];

    foreach ($deletedusers as $deleteduser) {
        $deleteduserPreferences = UserPreferences::where('user_id', $deleteduser->id)->first();
        $deleteduserImages[$deleteduser->id] = $deleteduserPreferences->avatar ?? 'images/default_profile.png';
    }

        return view('admin', compact('users', 'userImages','deletedusers','deleteduserImages'));
    }
    public function indexprofile($id)
    {
        $user = User::where('id', $id)->first();
        $userPreferences = UserPreferences::where('user_id', $id)->first();
        $userImages = $userPreferences->avatar ?? 'images/default_profile.png';
        $userTimetable[$user->id] = $userPreferences->timetable_path ?? 'images/default_document.png';

        return view('adminview', compact('user', 'userPreferences', 'userImages', 'userTimetable'));
    }
    public function deleteavatar($userid)
    {
        $userPreferences = UserPreferences::where('user_id', $userid)->first();
        $userPreferences->avatar = 'images/default_profile.png';
        $userPreferences->save();

        return redirect()->back()->with('success', 'Avatar deleted successfully');
    }

    public function deletetimetable($userid)
    {
        $userPreferences = UserPreferences::where('user_id', $userid)->first();
        $userPreferences->timetable_path = 'images/default_document.png';
        $userPreferences->save();

        return redirect()->back()->with('success', 'Timetable deleted successfully');
    }
    public function retrieveaccount($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    $user->deleted = false;
    $user->save();

    return redirect()->back()->with('success', 'Account retrieved successfully');
}


    public function updateBio(Request $request, $userid)
    {
        $validatedData = $request->validate([
            'bio' => 'required|string|max:255',
        ]);
        $userPreferences = UserPreferences::where('user_id', $userid)->first();
        $userPreferences->description = $validatedData['bio'];
        $userPreferences->save();

        return redirect()->back()->with('success', 'Bio updated successfully');
    }
}
