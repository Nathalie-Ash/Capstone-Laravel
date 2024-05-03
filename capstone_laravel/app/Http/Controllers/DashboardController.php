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

        $users = User::where('name', 'like', "%$query%")
            ->where('id', '!=', $authenticatedUser->id)
            ->where('deleted', false)
            ->get();

        $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();

        $usersformatch = UserPreferences::where('user_id', '!=', $authenticatedUser->id)
            ->where('users.deleted', false)
            ->whereNotIn('user_id', function ($query) use ($authenticatedUser) {
                $query->select('connection_id')
                    ->from('connections')
                    ->where('user_id', $authenticatedUser->id)
                    ->where('state', true);
            })
            ->join('users', 'users.id', '=', 'user_preferences.user_id')
            ->get();



        $matchedUsers = $this->calculateMatchingScores($authenticatedUserPreferences, $usersformatch);
        $campuses = UserPreferences::distinct()->pluck('campus');
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
        usort($matchedUsers, function ($a, $b) {
            return $b['matching_percentage'] - $a['matching_percentage'];
        });

        $userImages = [];
        foreach ($users as $user) {
            $userPreferences = UserPreferences::where('user_id', $user->id)->first();
            if ($userPreferences) {
                $userImages[$user->id] = $userPreferences->avatar;
            }
            logger($userImages);
        }


        return view('dashboard', compact(
            'users',
            'query',
            'matchedUsers',
            'campuses',
            'userImages',
            'outdoors',
            'indoors',
            'musics',
            'movies'
        ));
    }



    public function dashboard()
    {
        if (auth()->check()) {
            $authenticatedUser = auth()->user();

            $authenticatedUserPreferences = UserPreferences::where('user_id', $authenticatedUser->id)->first();
            $campuses = UserPreferences::distinct()->pluck('campus');
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

            $users = UserPreferences::where('user_id', '!=', $authenticatedUser->id)
                ->where('users.deleted', false)
                ->whereNotIn('user_id', function ($query) use ($authenticatedUser) {
                    $query->select('connection_id')
                        ->from('connections')
                        ->where('user_id', $authenticatedUser->id)
                        ->where('state', true);
                })
                ->join('users', 'users.id', '=', 'user_preferences.user_id')
                ->get();

            $matchedUsers = $this->calculateMatchingScores($authenticatedUserPreferences, $users);

            usort($matchedUsers, function ($a, $b) {
                return $b['matching_percentage'] - $a['matching_percentage'];
            });
            return view('dashboard',  compact(
                'matchedUsers',
                'campuses',
                'outdoors',
                'indoors',
                'musics',
                'movies'
            ));
        } else {
            return redirect('/login')->with('status', 'Your session has expired. Please log in again.');
        }
    }

    private function calculateMatchingScores($authenticatedUser, $users)
    {
        $matchedUsers = [];

        foreach ($users as $user) {
            $score = 0;

            if ($authenticatedUser->school == $user->school) {
                $score += 5;
            }

            if ($authenticatedUser->major == $user->major) {
                $score += 8;
            }

            if ($authenticatedUser->campus == $user->campus) {
                $score += 8;
            }

            $preferences = ['outdoor', 'indoor', 'music', 'movie'];

            foreach ($preferences as $preference) {
                for ($i = 1; $i <= 3; $i++) {
                    $userPreference = $user->{$preference . 'Item' . $i};

                    $authenticatedUserPreference = $authenticatedUser->{$preference . 'Item' . $i};

                    if ($userPreference == $authenticatedUserPreference) {
                        switch ($i) {
                            case 1:
                                $score += 10;
                                break;
                            case 2:
                                $score += 7.5;
                                break;
                            case 3:
                                $score += 5;
                                break;
                        }
                        break;
                    }
                }
            }

            $totalScore = 100;
            $matchingPercentage = ceil(($score / $totalScore) * 100);

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
        logger($request);
        $value = $request->input('value');
        logger($value);
        $campuses = UserPreferences::distinct()->pluck('campus');
        $users = UserPreferences::where('user_id', '!=', $authenticatedUser->id)
            ->where('users.deleted', false)
            ->whereNotIn('user_id', function ($query) use ($authenticatedUser) {
                $query->select('connection_id')
                    ->from('connections')
                    ->where('user_id', $authenticatedUser->id)
                    ->where('state', true);
            });

        if ($category === 'campus' && $value != "Both") {
            $users = $users->where($category, $value);
        } elseif ($category === 'campus' && $value === "Both") {
            $users = $users->whereIn($category, ['Beirut', 'Byblos']);
        } else {
            $users = $users->where(function ($query) use ($category, $value) {
                for ($i = 1; $i <= 3; $i++) {
                    $query->orWhere($category . 'Item' . $i, $value);
                }
            });
        }

        $users = $users->join('users', 'users.id', '=', 'user_preferences.user_id')
            ->get();


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


        return view('dashboard', compact(
            'matchedUsers',
            'campuses',
            'outdoors',
            'indoors',
            'musics',
            'movies'
        ));
    }
}
