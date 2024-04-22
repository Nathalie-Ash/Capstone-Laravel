<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserPreferences;
use App\Models\Connections;

class DashboardController extends Controller
{  
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Perform search logic, for example:
        $users = User::where('name', 'like', "%$query%")->get();
    
        // Retrieve the authenticated user's information
        $authenticatedUser = auth()->user();
        $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();
    
        // Calculate matching scores for each user
        $matchedUsers = $this->calculateMatchingScores($authenticatedUserPreferences, $users);
        
        // Sort the users based on matching scores
        usort($matchedUsers, function($a, $b) {
            return $b['matching_percentage'] - $a['matching_percentage'];
        });
    
        return view('dashboard', compact('users', 'query', 'matchedUsers'));
    }
    
    
    public function dashboard()
    {
        // Retrieve the authenticated user's information
        $authenticatedUser = auth()->user();
        $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();
       
        $campuses = UserPreferences::distinct()->pluck('campus');
        // Retrieve all users except the authenticated user
        $users = UserPreferences::where('user_id', '!=', $authenticatedUser->id)
        ->whereNotIn('user_id', function ($query) use ($authenticatedUser) {
            $query->select('connection_id')
                  ->from('connections')
                  ->where('user_id', $authenticatedUser->id)
                  ->where('state', true);
        })
        ->get();

        // Calculate matching scores for each user
        $matchedUsers = $this->calculateMatchingScores($authenticatedUserPreferences, $users);
        
        // Sort the users based on matching scores
        usort($matchedUsers, function($a, $b) {
            return $b['matching_percentage'] - $a['matching_percentage'];
        });

        // Return the dashboard view with matched users
        return view('dashboard',  compact('matchedUsers', 'campuses'));
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
                'user_id' => $user->user_id,
                'matching_percentage' => $matchingPercentage
            ];
        }
    
        return $matchedUsers;
    }
    public function filter(Request $request)
    {
        $authenticatedUser = auth()->user();
        $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();
        $campus = $request->input('campus');
        $campuses = UserPreferences::distinct()->pluck('campus');
        $users = UserPreferences::where('user_id', '!=', $authenticatedUser->id)
            ->whereNotIn('user_id', function ($query) use ($authenticatedUser) {
                $query->select('connection_id')
                    ->from('connections')
                    ->where('user_id', $authenticatedUser->id)
                    ->where('state', true);
            });
    
        if ($campus && $campus !== 'Both') {
            $users = $users->where('campus', $campus);
        }
    
        $users = $users->get();
    
        $matchedUsers = $this->calculateMatchingScores($authenticatedUserPreferences, $users);
    
        usort($matchedUsers, function ($a, $b) {
            return $b['matching_percentage'] - $a['matching_percentage'];
        });
    
        return view('dashboard', compact('matchedUsers','campuses'));
    }
    
}
