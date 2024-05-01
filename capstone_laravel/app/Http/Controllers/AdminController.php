<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userPreferences;
use App\Models\User; // Import the User model


class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->get(); // Get non-admin users
        $userImages = []; // Initialize an array to store user images

        // Populate the userImages array
        foreach ($users as $user) {
            $userPreferences = UserPreferences::where('user_id', $user->id)->first();
            $userImages[$user->id] = $userPreferences->avatar?? 'images/default_profile.png';
        }

        return view('admin', compact('users', 'userImages'));
    }
    public function indexprofile($id)
    {
        $user = User::where('id', $id)->first(); // Get non-admin users
        //$userImages = []; // Initialize an array to store user images

        // Populate the userImages array
       
        $userPreferences = UserPreferences::where('user_id', $id)->first();
        $userImages = $userPreferences->avatar ?? 'images/default_profile.png';


        return view('adminview', compact('user','userPreferences','userImages'));
    }
    public function deleteavatar($userid)
    {
       logger('iam here');
        $userPreferences = UserPreferences::where('user_id', $userid)->first();

        $userPreferences->avatar='images/default_profile.png';
        $userPreferences->save();
        
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Avatar deleted successfully');
    }
    
    public function deletetimetable($userid)
    {
       logger('iam here');
        $userPreferences = UserPreferences::where('user_id', $userid)->first();

        $userPreferences->timetable=null;
        $userPreferences->save();
        
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Avatar deleted successfully');
    }
    // AdminController.php

public function updateBio(Request $request, $userid)
{
    // Validate the incoming form data
    $validatedData = $request->validate([
        'bio' => 'required|string|max:255',
    ]);

    // Find the user preferences
    $userPreferences = UserPreferences::where('user_id', $userid)->first();

    // Update the bio
    $userPreferences->description = $validatedData['bio'];
    $userPreferences->save();
    
    // Redirect back with a success message
    return redirect()->back()->with('success', 'Bio updated successfully');
}


    }

