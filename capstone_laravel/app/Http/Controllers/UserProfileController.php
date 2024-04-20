<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Connections;
use App\Models\User;
use App\Models\userPreferences;

class UserProfileController extends Controller
{
    //
    public function userProfile($name)
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
            $existingConnection = Connections::where('user_id', $user->id)
            ->where('connection_id', $userId)
            ->first();

// Render the userProfile view with user data, connection status, and existing connection
return view('userProfile', compact('user', 'userPreferences', 'isConnection', 'existingConnection'));
        }
    }
    
    public function addProfile($profileId)
    {
        // Get the authenticated user's ID
        $userId = auth()->id();
    
        // Check if a connection already exists between the users
        $existingConnection = Connections::where('user_id', $profileId)
                                         ->where('connection_id', $userId)
                                         ->first();
    
        if ($existingConnection) {
            // Connection already exists, so it's either pending or accepted
            // You can handle this case as per your requirements
            // For now, let's assume you want to show a message
            return redirect()->back()->with('error', 'Friend request already sent or accepted');
        }
    
        // Assuming you want to create a new connection request
        $connection = new Connections();
        $connection->user_id = $profileId; // Profile being viewed
        $connection->connection_id = $userId; // Authenticated user
        $connection->state = false; // Pending request
        $connection->save();
    
        // Redirect back or to any desired page
        return redirect()->back()->with('success', 'Friend request sent successfully');
    }
    

}
