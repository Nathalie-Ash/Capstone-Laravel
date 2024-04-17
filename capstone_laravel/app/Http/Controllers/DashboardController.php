<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserPreferences;
use App\Models\Connections;

class DashboardController extends Controller
{  public function userProfile($name)
    {
        // Retrieve the authenticated user's ID
        $userId = auth()->id();
    
        // Retrieve the user based on the username
        $user = User::where('name', $name)->first();
    
        // Check if user exists
        if ($user) {
            // Retrieve user preferences
            $userPreferences = UserPreferences::where('user_id', $user->id)->first();
            
            // Check if there exists a connection between the authenticated user and the profile being viewed
            $connection = Connections::where('user_id', $userId)
                                        ->where('connection_id', $user->id)
                                        ->first();
    
            // Determine if the user profile being viewed is a connection and its state
            $isConnection = $connection && $connection->state;
    
            // Render the userProfile view with user data and connection status
            return view('userProfile', compact('user', 'userPreferences', 'isConnection'));
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
