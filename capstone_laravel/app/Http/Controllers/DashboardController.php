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
    
    public function dashboard()
    {
        // Retrieve the authenticated user's information
        $authenticatedUser = auth()->user();
        $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();
        // Retrieve all users except the authenticated user
        $users = UserPreferences::where('user_id', '!=', $authenticatedUser->id)->get();

        // Calculate matching scores for each user
        $matchedUsers = $this->calculateMatchingScores($authenticatedUserPreferences, $users);
        
        // Sort the users based on matching scores
        usort($matchedUsers, function($a, $b) {
            return $b['matching_percentage'] - $a['matching_percentage'];
        });

        // Return the dashboard view with matched users
        return view('dashboard', compact('matchedUsers'));
    }
    private function calculateMatchingScores($authenticatedUser, $users)
    {
        $matchedUsers = [];

        foreach ($users as $user) {
            $score = 0;
    
            // School Matching
            if ($authenticatedUser->school == $user->school) {
                $score += 8; // Significant score for same school
            }
    
            // Major Matching
            if ($authenticatedUser->major == $user->major) {
                $score += 10; // Lower score for same major
            }
    
            // Campus Matching
            if ($authenticatedUser->campus == $user->campus) {
                $score += 12; // Moderate score for same campus
            }
    
            // Preference Matching (Outdoor, Indoor, Music, Movies)
            $preferences = ['outdoor', 'indoor', 'music', 'movie'];
    
            foreach ($preferences as $preference) {
                for ($i = 1; $i <= 3; $i++) {
                    $userPreference = $user->{$preference . 'Item' . $i};
                
                    $authenticatedUserPreference = $authenticatedUser->{$preference . 'Item' . $i};
                    logger($userPreference);
    
                    // Check if the preferences match
                    if ($userPreference == $authenticatedUserPreference) {
                        // Add score based on the priority of the preference
                        switch ($i) {
                            case 1:
                                $score += 17.5; // Significant score for first preference
                                break;
                            case 2:
                                $score += 13; // Lower score for second preference
                                break;
                            case 3:
                                $score += 8; // Lowest score for third preference
                                break;
                        }
                        // Break the loop since a match is found
                        break;
                    }
                }
                logger($score);
            }
    
            // Calculate matching percentage out of 100
            $totalScore = 100; // Total score possible
            $matchingPercentage = ceil(($score / $totalScore) * 100);
    
            // Add user and matching percentage to the matchedUsers array
            $matchedUsers[] = [
                'user_id' => $user->id,
                'matching_percentage' => $matchingPercentage
            ];
        }
    
        return $matchedUsers;
    }
}
