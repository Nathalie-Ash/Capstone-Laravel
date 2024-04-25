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

    // Retrieve users with their IDs and names based on the search query
    $users = User::select('id', 'name')->where('name', 'like', "%$query%")->get();

    // Retrieve authenticated user's information and preferences
    $authenticatedUser = auth()->user();
    $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();

    // Retrieve users for matching
    $usersForMatch = UserPreferences::where('user_id', '!=', $authenticatedUser->id)
        ->whereNotIn('user_id', function ($query) use ($authenticatedUser) {
            $query->select('connection_id')
                ->from('connections')
                ->where('user_id', $authenticatedUser->id)
                ->where('state', true);
        })
        ->get();

    // Retrieve avatars for the users returned from the search query
    $userImages = [];
    foreach ($users as $user) {
        $userPreferences = UserPreferences::where('user_id', $user->id)->first();
        if ($userPreferences) {
            $userImages[$user->id] = $userPreferences->avatar;
        }
    }

    // Calculate matching scores for each user
    $matchedUsers = $this->calculateMatchingScores($authenticatedUserPreferences, $usersForMatch);

    // Retrieve campus options
    $campuses = UserPreferences::distinct()->pluck('campus');

    // Retrieve user preferences for outdoor, indoor, music, and movie
    $outdoor1 = $authenticatedUserPreferences->outdoorItem1;
    $outdoor2 = $authenticatedUserPreferences->outdoorItem2;
    $outdoor3 = $authenticatedUserPreferences->outdoorItem3;

    $indoor1 = $authenticatedUserPreferences->indoorItem1;
    $indoor2 = $authenticatedUserPreferences->indoorItem2;
    $indoor3 = $authenticatedUserPreferences->indoorItem3;

    $music1 = $authenticatedUserPreferences->musicItem1;
    $music2 = $authenticatedUserPreferences->musicItem2;
    $music3 = $authenticatedUserPreferences->musicItem3;

    $movie1 = $authenticatedUserPreferences->movieItem1;
    $movie2 = $authenticatedUserPreferences->movieItem2;
    $movie3 = $authenticatedUserPreferences->movieItem3;

    // Sort the users based on matching scores
    usort($matchedUsers, function($a, $b) {
        return $b['matching_percentage'] - $a['matching_percentage'];
    });

    return view('dashboard', compact('users', 'query', 'matchedUsers', 'campuses', 'userImages',
        'outdoor1', 'outdoor2', 'outdoor3', 'indoor1', 'indoor2', 'indoor3', 
        'music1', 'music2', 'music3', 'movie1', 'movie2', 'movie3'));
}

    
    
    public function dashboard()
    {
        // Retrieve the authenticated user's information
        $authenticatedUser = auth()->user();
       
        $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();
        //logger($authenticatedUserPreferences);
        $campuses = UserPreferences::distinct()->pluck('campus');
        //logger($campuses);
            $outdoor1 = $authenticatedUserPreferences->outdoorItem1;
            $outdoor2 = $authenticatedUserPreferences->outdoorItem2;
            $outdoor3 = $authenticatedUserPreferences->outdoorItem3;
    
            $indoor1 = $authenticatedUserPreferences->indoorItem1;
            $indoor2 = $authenticatedUserPreferences->indoorItem2;
            $indoor3 = $authenticatedUserPreferences->indoorItem3;
    
            $music1 = $authenticatedUserPreferences->musicItem1;
            $music2 = $authenticatedUserPreferences->musicItem2;
            $music3 = $authenticatedUserPreferences->musicItem3;
    
            $movie1 = $authenticatedUserPreferences->movieItem1;
            $movie2 = $authenticatedUserPreferences->movieItem2;
            $movie3 = $authenticatedUserPreferences->movieItem3;

           // logger($outdoor1);
        
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
        return view('dashboard',  compact('matchedUsers', 'campuses',
        'outdoor1','outdoor2','outdoor3',
        'indoor1','indoor2','indoor3', 
        'music1', 'music2','music3',
        'movie1','movie2','movie3'
    ));
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
                    //logger($userPreference);
    
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
                //logger($score);
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
    }public function filter(Request $request)
    {
        $authenticatedUser = auth()->user();
        $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();
        $category = $request->input('category');
        logger($request); // New
        $value = $request->input('value'); // New
        logger($value);
        $campuses = UserPreferences::distinct()->pluck('campus');
        $users = UserPreferences::where('user_id', '!=', $authenticatedUser->id)
            ->whereNotIn('user_id', function ($query) use ($authenticatedUser) {
                $query->select('connection_id')
                    ->from('connections')
                    ->where('user_id', $authenticatedUser->id)
                    ->where('state', true);
            });
    
        if ($category === 'campus' & $value!="Both") {
            $users = $users->where($category, $value);
        } 
            else {
            $users = $users->where(function ($query) use ($category, $value) {
                for ($i = 1; $i <= 3; $i++) {
                    $query->orWhere($category . 'Item' . $i, $value);
                }
            });
        }
    
        $users = $users->get();
    
        $matchedUsers = $this->calculateMatchingScores($authenticatedUserPreferences, $users);
    
        usort($matchedUsers, function ($a, $b) {
            return $b['matching_percentage'] - $a['matching_percentage'];
        });
        $outdoor1 = $authenticatedUserPreferences->outdoorItem1;
        $outdoor2 = $authenticatedUserPreferences->outdoorItem2;
        $outdoor3 = $authenticatedUserPreferences->outdoorItem3;
    
        $indoor1 = $authenticatedUserPreferences->indoorItem1;
        $indoor2 = $authenticatedUserPreferences->indoorItem2;
        $indoor3 = $authenticatedUserPreferences->indoorItem3;
    
        $music1 = $authenticatedUserPreferences->musicItem1;
        $music2 = $authenticatedUserPreferences->musicItem2;
        $music3 = $authenticatedUserPreferences->musicItem3;
    
        $movie1 = $authenticatedUserPreferences->movieItem1;
        $movie2 = $authenticatedUserPreferences->movieItem2;
        $movie3 = $authenticatedUserPreferences->movieItem3;
        
        return view('dashboard', compact('matchedUsers', 'campuses',
            'outdoor1', 'outdoor2', 'outdoor3',
            'indoor1', 'indoor2', 'indoor3',
            'music1', 'music2', 'music3',
            'movie1', 'movie2', 'movie3'
        ));
    }
    
    
}
