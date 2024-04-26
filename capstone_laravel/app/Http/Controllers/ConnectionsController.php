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
        $this->middleware('auth'); // Assuming authentication is required for profile1 page
       // $this->displayProfile1(); // Call the displayProfile1 method automatically
    }
    public function pendingConnectionRequests()
    {
        // Retrieve the authenticated user's ID
        $userId = auth()->id();

        // Retrieve pending connection requests for the authenticated user
        $requests = Connections::where('user_id', $userId) // Assuming receiver_id is the foreign key for the user who received the request
            ->where('state', false)
            ->with('sender')
            ->get();
        logger($requests);

        $userImages = [];
        $mutualConnections=[];
        // If there are pending requests, retrieve the corresponding senders
        foreach ($requests as $connection) {
            $userImage = UserPreferences::where('user_id', $connection->sender->id)->first();
            if ($userImage)
                $userImages[$connection->sender->id] = $userImage->avatar;
            $mutualConnections[$connection->sender->id] = $this->getMutualConnections($userId, $connection->sender->id);
        }
        return view('requests', compact('requests', 'userImages','mutualConnections'));
   

        // If there are no pending requests, return a message or redirect

    }
    
    public function myConnections()
    {
        // Retrieve the authenticated user's ID
        $userId = auth()->id();
    
        // Retrieve pending connection requests for the authenticated user
        $connections = Connections::where('user_id', $userId)
            ->where('state', true)
            ->with('sender')
            ->get();
        
        // Initialize an array to store user images
        $userImages = [];
    
        // Initialize the $sentContact variable
        $sentContact = null;
        $mutualConnections = [];
    
        // Retrieve user image for each connection
        foreach ($connections as $connection) {
            $userImage = UserPreferences::where('user_id', $connection->sender->id)->first();
            if ($userImage)
                $userImages[$connection->sender->id] = $userImage->avatar;
    
            // Retrieve sent contact information
            $sentContact = userContacts::where('user_id', $userId)
                ->where('state', true)
                ->where('sent', 1)
                ->first();
            $mutualConnections[$connection->sender->id] = $this->getMutualConnections($userId, $connection->sender->id);
        }
    
        return view('connections', compact('connections', 'userImages', 'sentContact','mutualConnections'));
    }
    
    private function getMutualConnections($user1Id, $user2Id)
{
    $user1Connections = Connections::where('user_id', $user1Id)->where('state',true)->pluck('connection_id');
    $user2Connections = Connections::where('user_id', $user2Id)->where('state',true)->pluck('connection_id');

    $mutualConnections = $user1Connections->intersect($user2Connections)->toArray();

    return count($mutualConnections);
}
    
    public function acceptConnection(Request $request)
    {
        $userId = auth()->id();
        $connectionId = $request->input('connection_id');
    
        $connection = Connections::where('connection_id', $connectionId)
            ->where('user_id', $userId) // Add this condition
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
        ->where('user_id', $userId) // Add this condition
        ->first();

    
        if (!$connection) {
            return redirect()->back()->with('error', 'Connection not found.');
        }
    
        // Delete the connection
        $connection->delete();
    
        // Also, delete the reverse connection
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
        ->where('user_id', $userId) // Add this condition
        ->first();

    
        if (!$connection) {
            return redirect()->back()->with('error', 'Connection not found.');
        }
    
        // Delete the connection
        $connection->delete();
    
        // Also, delete the reverse connection
        // $reverseConnection = Connections::where('user_id', $connection->connection_id)
        //                                  ->where('connection_id', $connection->user_id)
        //                                  ->first();
        // if ($reverseConnection) {
        //     $reverseConnection->delete();
        // }
    
        return redirect()->back()->with('success', 'Connection removed successfully.');
    }

}
