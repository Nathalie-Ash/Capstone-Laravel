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
        $userId = auth()->id();
        logger($id);
        $user = User::where('id', $id)->where('deleted', false)->first();

        if ($user) {
            $userPreferences = UserPreferences::where('user_id', $user->id)->first();
            $connection = Connections::where('user_id', $userId)
                ->where('connection_id', $user->id)
                ->first();

            $isConnection = $connection && $connection->state;
            $authenticatedUserPreferences = UserPreferences::where('user_id', $userId)->first();

            $matchingPercentage = $this->calculateMatchingScores($authenticatedUserPreferences, $userPreferences);
            $existingConnection = Connections::where('user_id', $user->id)
                ->where('connection_id', $userId)
                ->where('state', false)
                ->first();

            $contact = userContacts::where('user_id', $userId)
                ->where('connection_id', $user->id)
                ->first();
            $sharedContact = userContacts::where('user_id', $user->id)->where('connection_id', $userId)->where('sent', 1)->first();
            logger("shared contact info", [$sharedContact]);
            $isContact = $contact && $contact->sent;

            return view('userProfile', compact('user', 'userPreferences', 'isConnection', 'matchingPercentage', 
            'existingConnection', 'sharedContact', 'isContact'));
        }
    }

    public function addProfile($profileId)
    {
        $userId = auth()->id();

        $existingConnection = Connections::where('user_id', $profileId)
            ->where('connection_id', $userId)
            ->first();

        if ($existingConnection) {

            return redirect()->back()->with('error', 'Friend request already sent or accepted');
        }

        $connection = new Connections();
        $connection->user_id = $profileId;
        $connection->connection_id = $userId;
        $connection->state = false;
        $connection->save();

        return redirect()->back()->with('success', 'Friend request sent successfully');
    }
    private function calculateMatchingScores($authenticatedUser, $user)
    {
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
         
           
            $totalScore = 100; 
            $matchingPercentage = ceil(($score / $totalScore) * 100);

    
        }

        return $matchingPercentage;
    }
}
