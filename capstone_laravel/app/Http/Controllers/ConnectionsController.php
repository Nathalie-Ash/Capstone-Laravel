<?php

namespace App\Http\Controllers;

use App\Models\Connections;
use App\Models\userContacts;
use Illuminate\Http\Request;
use App\Models\userPreferences;
use App\Http\Controllers\PreferencesController;

class ConnectionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pendingConnectionRequests()
    {
        $userId = auth()->id();

        $requests = Connections::where('user_id', $userId)
            ->where('state', false)
            ->join('users', 'users.id', '=', 'connections.connection_id')
            ->where('users.deleted', false)
            ->with('sender')
            ->get();
        logger($requests);

        $userImages = [];
        $mutualConnections = [];
        foreach ($requests as $connection) {
            $userImage = UserPreferences::where('user_id', $connection->sender->id)->first();
            if ($userImage)
                $userImages[$connection->sender->id] = $userImage->avatar;
            $mutualConnections[$connection->sender->id] = $this->getMutualConnections($userId, $connection->sender->id);
        }
        return view('requests', compact('requests', 'userImages', 'mutualConnections'));
    }

    public function myConnections()
    {

        $userId = auth()->id();
        $userId = auth()->id();

        $connections = Connections::where('user_id', $userId)
            ->where('state', true)
            ->join('users', 'users.id', '=', 'connections.connection_id')
            ->where('users.deleted', false)
            ->with('sender')
            ->get();

        $userImages = [];
        $sentContact = [];
        $mutualConnections = [];
        foreach ($connections as $connection) {
            $userImage = UserPreferences::where('user_id', $connection->sender->id)->first();
            if ($userImage)
                $userImages[$connection->sender->id] = $userImage->avatar;

            $sentContact[$connection->sender->id] = userContacts::where('user_id', $userId)
                ->where('connection_id', $connection->sender->id)
                ->where('state', true)
                ->where('sent', 1)
                ->first();

            $mutualConnections[$connection->sender->id] = $this->getMutualConnections($userId, $connection->sender->id);
        }

        return view('connections', compact('connections', 'userImages', 'sentContact', 'mutualConnections'));
    }

    private function getMutualConnections($user1Id, $user2Id)
    {
        $user1Connections = Connections::where('user_id', $user1Id)->where('state', true)->pluck('connection_id');
        $user2Connections = Connections::where('user_id', $user2Id)->where('state', true)->pluck('connection_id');

        $mutualConnections = $user1Connections->intersect($user2Connections)->toArray();

        return count($mutualConnections);
    }

    public function acceptConnection(Request $request)
    {
        $userId = auth()->id();
        $connectionId = $request->input('connection_id');

        $connection = Connections::where('connection_id', $connectionId)
            ->where('user_id', $userId)
            ->first();

        if (!$connection) {
            return redirect()->back()->with('error', 'Connection not found.');
        }

        if ($connection->state == true) {
            return redirect()->back()->with('error', 'Connection exists.');
        }

        $connection->state = true;
        $connection->save();

        $connection1 = new Connections();
        $connection1->user_id = $connectionId;
        $connection1->connection_id = $userId;
        $connection1->state = true;
        $connection1->save();

        return redirect()->back()->with('success', 'Connection accepted successfully.');
    }

    public function removeConnection($connectionid)
    {
        $userId = auth()->id();
        $connection = Connections::where('connection_id', $connectionid)
            ->where('user_id', $userId) 
            ->first();


        if (!$connection) {
            return redirect()->back()->with('error', 'Connection not found.');
        }

        $connection->delete();

        $reverseConnection = Connections::where('user_id', $connection->connection_id)
            ->where('connection_id', $connection->user_id)
            ->first();
        if ($reverseConnection) {
            $reverseConnection->delete();
        }

        return redirect()->back()->with('success', 'Connection removed successfully.');
    }

    public function deleteRequest(Request $request)
    {
        $userId = auth()->id();
        $connectionid = $request->input('connection_id');
        $connection = Connections::where('connection_id', $connectionid)
            ->where('user_id', $userId)
            ->first();
        if (!$connection) {
            return redirect()->back()->with('error', 'Connection not found.');
        }
        $connection->delete();
        return redirect()->back()->with('success', 'Connection removed successfully.');
    }
}
