<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserPreferences;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Connections;

class UserController extends Controller
{
    use SoftDeletes;


    public function __construct()
    {
        $this->middleware('auth'); // Assuming authentication is required for profile1 page
        $this->displayProfile1(); // Call the displayProfile1 method automatically
    }

    public function displayProfile1()
    {
        // Retrieve user data from the database
        $userData = User::find(auth()->id());
        $userImage = UserPreferences::where('user_id', auth()->id())->first();

        // Render the profile1 view with user data
        return view('profile1', compact('userData', 'userImage'));
    }

    public function showDeleteAccountConfirmation()
    {
        // You can return a view with a confirmation message
        return view('confirm-delete-account');
    }

    public function softDelete($id)
    {
        $user = User::findOrFail($id);
        $user->deleted = true; // Set the custom deleted field to true
        $user->save();

        return redirect()->route('login')->with('success', 'User soft deleted successfully.');
    }
    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Perform the search query using the User model
        $users = User::where('name', 'like', '%' . $query . '%')->get();
        $userData = [];
        foreach ($users as $user) {
            $userData[$user->id] = UserPreferences::where('user_id', $user->id)->first();
        }
    
        // Return the search results view with the users, query, and userData
        return view('search', compact('users', 'query', 'userData'));
    }
    

    public function restore($id)
    {
        $user = User::findOrFail($id);
        $user->deleted = false; // Restore the record by setting custom deleted field to false
        $user->save();

        return redirect()->back()->with('success', 'User restored successfully.');
    }
    public function addProfile($profileId)
    {
        // Get the authenticated user's ID
        $userId = auth()->id();
    
        // Check if a connection already exists between the users
        $existingConnection = Connections::where('user_id', $profileId)
                                         ->where('connection_id', $userId)
                                         ->first();
    
        if ($existingConnection) {
            // Connection already exists, so it's either pending or accepted
            // You can handle this case as per your requirements
            // For now, let's assume you want to show a message
            return redirect()->back()->with('error', 'Friend request already sent or accepted');
        }
    
        // Assuming you want to create a new connection request
        $connection = new Connections();
        $connection->user_id = $profileId; // Profile being viewed
        $connection->connection_id = $userId; // Authenticated user
        $connection->state = false; // Pending request
        $connection->save();
    
        // Redirect back or to any desired page
        return redirect()->back()->with('success', 'Friend request sent successfully');
    }
    
}
