<?php

namespace App\Http\Controllers;
use App\Models\Connections;
use Illuminate\Http\Request;

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
        $connections = Connections::where('user_id', $userId) // Assuming receiver_id is the foreign key for the user who received the request
            ->where('state', true)
            ->with('sender')
            ->get();

        // If there are pending requests, retrieve the corresponding senders
        // if ($connections->isNotEmpty()) {
        //     return view('connections', compact('connections'));
        // }

        // // If there are no pending requests, return a message or redirect
        // return redirect()->route('connections')->with('success', 'Connection accepted successfully.');
        return view('connections', compact('connections'));
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

}
