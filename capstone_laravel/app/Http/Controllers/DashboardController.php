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
        $authenticatedUser = auth()->user();
    
        // Perform search logic, for example:
        $users = User::where('name', 'like', "%$query%")
                    ->where('id', '!=', $authenticatedUser->id)
                    ->get();
    
        // Retrieve the authenticated user's information
        
        $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();
    
        $usersformatch = UserPreferences::where('user_id', '!=', $authenticatedUser->id)
        ->whereNotIn('user_id', function ($query) use ($authenticatedUser) {
            $query->select('connection_id')
                  ->from('connections')
                  ->where('user_id', $authenticatedUser->id)
                  ->where('state', true);
        })
        ->get();

        // Calculate matching scores for each user
        $matchedUsers = $this->calculateMatchingScores($authenticatedUserPreferences, $usersformatch);
        $campuses = UserPreferences::distinct()->pluck('campus');
        // $outdoors= UserPreferences::distinct()->pluck('outdoorItem1'f);
        //logger($campuses);
        $outdoors = UserPreferences::pluck('outdoorItem1')
        ->merge(UserPreferences::pluck('outdoorItem2'))
        ->merge(UserPreferences::pluck('outdoorItem3'))
        ->flatten()
        ->unique();

$indoors = UserPreferences::pluck('indoorItem1')
        ->merge(UserPreferences::pluck('indoorItem2'))
        ->merge(UserPreferences::pluck('indoorItem3'))
        ->flatten()
        ->unique();

$musics = UserPreferences::pluck('musicItem1')
        ->merge(UserPreferences::pluck('musicItem2'))
        ->merge(UserPreferences::pluck('musicItem3'))
        ->flatten()
        ->unique();

$movies = UserPreferences::pluck('movieItem1')
        ->merge(UserPreferences::pluck('movieItem2'))
        ->merge(UserPreferences::pluck('movieItem3'))
        ->flatten()
        ->unique();
        // Sort the users based on matching scoresfffffffffffffffrvrvvvvvvvvvvvvvvvvrvrrvvffrv
        usort($matchedUsers, function($a, $b) {
            return $b['matching_percentage'] - $a['matching_percentage'];
        });
    
        return view('dashboard', compact('users', 'query', 'matchedUsers','campuses',
        'outdoors',
        'indoors',
        'musics', 
        'movies'));
    }
    
    
    public function dashboard()
    {
        // Retrieve the authenticated user's information
        $authenticatedUser = auth()->user();
       
        $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();
        //logger($authenticatedUserPreferences);
        $campuses = UserPreferences::distinct()->pluck('campus');
        //logger($campuses);
        $outdoors = UserPreferences::pluck('outdoorItem1')
                                ->merge(UserPreferences::pluck('outdoorItem2'))
                                ->merge(UserPreferences::pluck('outdoorItem3'))
                                ->flatten()
                                ->unique();

$indoors = UserPreferences::pluck('indoorItem1')
                                ->merge(UserPreferences::pluck('indoorItem2'))
                                ->merge(UserPreferences::pluck('indoorItem3'))
                                ->flatten()
                                ->unique();

$musics = UserPreferences::pluck('musicItem1')
                                ->merge(UserPreferences::pluck('musicItem2'))
                                ->merge(UserPreferences::pluck('musicItem3'))
                                ->flatten()
                                ->unique();

$movies = UserPreferences::pluck('movieItem1')
                                ->merge(UserPreferences::pluck('movieItem2'))
                                ->merge(UserPreferences::pluck('movieItem3'))
                                ->flatten()
                                ->unique();

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
        'outdoors',
        'indoors',
        'musics', 
        'movies'));
    }
    private function calculateMatchingScores($authenticatedUser, $users)
    {
        $matchedUsers = [];

        foreach ($users as $user) {
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
        $outdoors = UserPreferences::pluck('outdoorItem1')
                                ->merge(UserPreferences::pluck('outdoorItem2'))
                                ->merge(UserPreferences::pluck('outdoorItem3'))
                                ->flatten()
                                ->unique();

$indoors = UserPreferences::pluck('indoorItem1')
                                ->merge(UserPreferences::pluck('indoorItem2'))
                                ->merge(UserPreferences::pluck('indoorItem3'))
                                ->flatten()
                                ->unique();

$musics = UserPreferences::pluck('musicItem1')
                                ->merge(UserPreferences::pluck('musicItem2'))
                                ->merge(UserPreferences::pluck('musicItem3'))
                                ->flatten()
                                ->unique();

$movies = UserPreferences::pluck('movieItem1')
                                ->merge(UserPreferences::pluck('movieItem2'))
                                ->merge(UserPreferences::pluck('movieItem3'))
                                ->flatten()
                                ->unique();


        return view('dashboard', compact('matchedUsers', 'campuses',
            'outdoors', 
            'indoors',
            'musics', 
            'movies'
        ));
    }
    
    
}
