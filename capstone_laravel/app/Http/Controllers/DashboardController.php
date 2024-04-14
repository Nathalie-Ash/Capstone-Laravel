<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserPreferences;

class DashboardController extends Controller
{   
    public function userProfile($name)
{
    // Retrieve the user based on the username
    $user = User::where('name', $name)->first();
    $userPreferences = UserPreferences::where('user_id', $user->id)->first();
    // Check if user exists
    if ($user) {
        // You can fetch additional user data if needed
        
        // Render the userProfile view with user data
        return view('userProfile', compact('user', 'userPreferences'));
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search logic, for example:
        $users = User::where('name', 'like', "%$query%")->get();

        return view('dashboard', compact('users', 'query'));
    }
}
