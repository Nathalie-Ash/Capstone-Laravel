<?php

namespace App\Http\Controllers;
use App\Models\Connections;
use Illuminate\Http\Request;
use App\Http\Controllers\PreferencesController;
use App\Models\userPreferences;

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

        // If there are pending requests, retrieve the corresponding senders
       
            return view('requests', compact('requests'));
   

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

    // Retrieve user image for each connection
    foreach ($connections as $connection) {
        $userImage = UserPreferences::where('user_id', $connection->sender->id)->first();
        if ($userImage)
        $userImages[$connection->sender->id] = $userImage ? $userImage->avatar : 'images/default_profile.png';
    }

    return view('connections', compact('connections', 'userImages'));
}

    
    public function acceptConnection(Request $request)
    {
        $connectionId = $request->input('connection_id');

        $connection = Connections::where('connection_id', $connectionId)->first(); // Assuming receiver_id is the foreign key for the user who received the request
            
        if (!$connection) {
            return redirect()->back()->with('error', 'Connection not found.');
        }

        $connection->state = true;
        $connection->save();
        // Get the authenticated user's ID
        $userId = auth()->id();
        logger($userId);
        $connection1 = new Connections();
        $connection1->user_id = $connectionId; // Authenticated user's ID
        $connection1->connection_id = $userId; // ID of the profile being viewed
        $connection1->state = true; 
        $connection1->save();

        return redirect()->back()->with('success', 'Connection accepted successfully.');
    }
    public function removeConnection($connectionid)
    {
        $connection = Connections::find($connectionid);
    
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
    


}
