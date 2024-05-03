<?php

namespace App\Http\Controllers;

use App\Models\Connections;
use App\Models\userContacts;
use Illuminate\Http\Request;

class userContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function sendContact($connectionid)
    {
        $validatedData = request()->validate([
            'phone_number' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedIn' => 'nullable|string',
            'tiktok' => 'nullable|string'
        ]);

        $userId = auth()->id();

        $connection = Connections::where('user_id', $userId)
            ->where('connection_id', $connectionid)
            ->where('state', true)
            ->first();
        if (!$connection) {
            return redirect()->back()->with('error', 'Invalid connection ID');
        }

        $userContact = new userContacts();
        $userContact->user_id = $userId;
        $userContact->connection_id = $connectionid;
        $userContact->phone_number = $validatedData['phone_number'];
        $userContact->instagram = $validatedData['instagram'];
        $userContact->tiktok = $validatedData['tiktok'];
        $userContact->linkedIn = $validatedData['linkedIn'];
        $userContact->state = $connection->state; 
        $userContact->sent = true;
        $userContact->save();

        return redirect()->back()->with('success', 'Contact information sent successfully!');
    }

    public function receivedContacts()
    {
        $userId = auth()->id();
        $receivedContacts = UserContacts::where('user_contacts.connection_id', $userId)
            ->where('user_contacts.sent', 1) 
            ->join('users as sender', 'user_contacts.connection_id', '=', 'sender.id')
            ->join('users as receiver', 'user_contacts.user_id', '=', 'receiver.id')
            ->select(
                'user_contacts.*',
                'sender.name as sender_name',
                'receiver.name as receiver_name',
                'receiver.id as receiver_id'
            )
            ->get();

        return view('contact', compact('receivedContacts'));
    }
}
