<?php

namespace App\Http\Controllers;

use App\Models\Connections;
use App\Models\userContacts;
use Illuminate\Http\Request;

class userContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Assuming authentication is required for profile1 page
        // $this->displayProfile1(); // Call the displayProfile1 method automatically
    }

    public function sendContact($connectionId)
    {
        // Validate the incoming request data
        $validatedData = request()->validate([
            'phone_number' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedIn' => 'nullable|string',
            'tiktok' => 'nullable|string'
        ]);

        // Get the authenticated user's ID
        $userId = auth()->id();

        // Find the connection by ID to ensure it belongs to the authenticated user
        $connection = Connections::where('user_id', $userId)
            ->where('connection_id', $connectionId)
            ->where('state', true)
            ->first();

        // Check if the connection exists
        if (!$connection) {
            // Handle the case where the connection does not exist or is not valid
            return redirect()->back()->with('error', 'Invalid connection ID');
        }

        // Create a new UserContact record for the specific connection
        $userContact = new userContacts();
        $userContact->user_id = $userId; // Authenticated user's ID
        $userContact->connection_id = $connectionId; // Connection's ID
        $userContact->phone_number = $validatedData['phone_number'];
        $userContact->instagram = $validatedData['instagram'];
        $userContact->tiktok = $validatedData['tiktok'];
        $userContact->linkedIn = $validatedData['linkedIn'];
        $userContact->state = $connection->state; // Set the state from the connection
        $userContact->sent = true; // Marking the contact as sent
        $userContact->save();

        // Optionally, redirect back with a success message
        return redirect()->back()->with('success', 'Contact information sent successfully!');
    }

    public function receivedContacts()
    {
        // Retrieve the ID of the current authenticated user
        $userId = auth()->id();

        // Query connections where the current user is the receiver



        $receivedContacts = UserContacts::where('user_contacts.connection_id', $userId)
            ->where('user_contacts.sent', 1) // Assuming 'sent' indicates the contact has been shared
            ->join('users as sender', 'user_contacts.connection_id', '=', 'sender.id')
            ->join('users as receiver', 'user_contacts.user_id', '=', 'receiver.id')
            ->select(
                'user_contacts.*',
                'sender.name as sender_name',
                'receiver.name as receiver_name',
                'receiver.id as receiver_id'
            )
            ->get();

        logger($receivedContacts);

        // Pass the received connections to the view for display
        return view('contact', compact('receivedContacts'));
    }
}
