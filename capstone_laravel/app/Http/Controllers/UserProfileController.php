<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Connections;
use App\Models\userContacts;
use Illuminate\Http\Request;
use App\Models\userPreferences;

class UserProfileController extends Controller
{
    //
    public function userProfile($id)
    {
        // Retrieve the authenticated user's ID
        $userId = auth()->id();
        logger($id);
        // Retrieve the user based on the username
        $user = User::where('id', $id)->first();
    
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
            $authenticatedUserPreferences = UserPreferences::where('user_id', $userId)->first();
            
            // Calculate matching scores between the authenticated user and the user whose profile is being viewed
          
            $matchingPercentage = $this->calculateMatchingScores($authenticatedUserPreferences, $userPreferences);

            // Render the userProfile view with user data and connection status
            $existingConnection = Connections::where('user_id', $user->id)
            ->where('connection_id', $userId)
            ->where('state',false)
            ->first();

            $contact = userContacts::where('user_id', $userId)
            ->where('connection_id', $user->id)
            ->first();
            $sharedContact = userContacts::where('user_id', $user->id)->where('connection_id',$userId)->where('sent',1)->first();
            $isContact = $contact && $contact->sent;
            

// Render the userProfile view with user data, connection status, and existing connection
return view('userProfile', compact('user', 'userPreferences', 'isConnection', 'matchingPercentage','existingConnection','sharedContact', 'isContact'));
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
    private function calculateMatchingScores($authenticatedUser, $user)
    {
        //$matchedUsers = [];

        //foreach ($users as $user) {
            $score = 0;
    
            // School Matching
            if ($authenticatedUser->school == $user->school) {
                $score += 5; // Significant score for same school
            }
    
            // Major Matching
            if ($authenticatedUser->major == $user->major) {
                $score += 8; // Lower score for same major
            }
    
            // Campus Matching
            if ($authenticatedUser->campus == $user->campus) {
                $score += 8; // Moderate score for same campus
            }
    
            // Preference Matching (Outdoor, Indoor, Music, Movies)
            $preferences = ['outdoor', 'indoor', 'music', 'movie'];
    
            foreach ($preferences as $preference) {
                for ($i = 1; $i <= 3; $i++) {
                    $userPreference = $user->{$preference . 'Item' . $i};
                
                    $authenticatedUserPreference = $authenticatedUser->{$preference . 'Item' . $i};
                    //logger($userPreference);
    
                    // Check if the preferences match
                    if ($userPreference == $authenticatedUserPreference) {
                        // Add score based on the priority of the preference
                        switch ($i) {
                            case 1:
                                $score += 10; // Significant score for first preference
                                break;
                            case 2:
                                $score += 7.5; // Lower score for second preference
                                break;
                            case 3:
                                $score += 5; // Lowest score for third preference
                                break;
                        }
                        // Break the loop since a match is found
                        break;
                    }
                }
                //logger($score);
            //}
    
            // Calculate matching percentage out of 100
            $totalScore = 100; // Total score possible
            $matchingPercentage = ceil(($score / $totalScore) * 100);
    
            // Add user and matching percentage to the matchedUsers array
            // $matchedUsers[] = [
            //     'user_id' => $user->user_id,
            //     'matching_percentage' => $matchingPercentage
            // ];
        }
    
        return $matchingPercentage;
    }

}
