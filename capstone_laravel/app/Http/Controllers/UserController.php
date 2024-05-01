<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserPreferences;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Connections;

class UserController extends Controller
{
    use SoftDeletes;


    public function __construct()
    {
        $this->middleware('auth'); // Assuming authentication is required for profile1 page
        $this->displayProfile1(); // Call the displayProfile1 method automatically
    }



    public function displayProfile1()
    {
        // Retrieve user data from the database
        $userData = User::find(auth()->id());
        $userImage = UserPreferences::where('user_id', auth()->id())->first();
        $userTimetable = UserPreferences::where('user_id', auth()->id())->first();
        // Render the profile1 view with user data
        return view('profile1', compact('userData', 'userImage', 'userTimetable'));
    }

    public function showDeleteAccountConfirmation()
    {
        // You can return a view with a confirmation message
        return view('confirm-delete-account');
    }

    public function softDelete($id)
    {
        $user = User::findOrFail($id);
        $user->deleted = true; // Set the custom deleted field to true
        $user->save();

        return redirect()->route('login')->with('success', 'User soft deleted successfully.');
    }
    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Perform the search query using the User model
        $users = User::where('name', 'like', '%' . $query . '%')->get();
        $userData = [];
        foreach ($users as $user) {
            $userData[$user->id] = UserPreferences::where('user_id', $user->id)->first();
        }

        // Return the search results view with the users, query, and userData
        return view('search', compact('users', 'query', 'userData'));
    }


    public function restore($id)
    {
        $user = User::findOrFail($id);
        $user->deleted = false; // Restore the record by setting custom deleted field to false
        $user->save();

        return redirect()->back()->with('success', 'User restored successfully.');
    }

    public function resetPassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id', // Assuming user_id is passed along with the request
            'new_password' => ['required', 'min:8', 'max:30', 'confirmed'],
        ]);

        // Find the user by ID
        $user = User::findOrFail($request->user_id);

        // Update the user's password
        $user->password = bcrypt($request->new_password); // Hash the new password before saving

        // Save the updated user
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Password reset successfully!');
    }


    public function updateTimetable(Request $request)
    {
        // Validate the request
        $request->validate([
            'timetable' => 'required|mimes:pdf,doc,docx|max:2048', // Adjust max file size as needed
        ]);

        // Get the authenticated user's preferences
        $userPreferences = $request->user()->preferences;

        // Handle file upload
        if ($request->hasFile('timetable')) {
            $file = $request->file('timetable');
            $fileName = $file->getClientOriginalName(); // Get the original file name
            $filePath = $file->storeAs('timetables', $fileName); // Store the file

            // Update the timetable_path attribute in the UserPreferences table
            $userPreferences->timetable_path = $filePath;
            $userPreferences->save();

            return response()->json(['message' => 'File uploaded successfully'], 200);
        }

        return response()->json(['error' => 'File not provided'], 400);
    }
}
