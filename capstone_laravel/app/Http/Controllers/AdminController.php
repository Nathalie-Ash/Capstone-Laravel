<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->get(); // Get non-admin users
        $userImages = []; // Initialize an array to store user images

        // Populate the userImages array
        foreach ($users as $user) {
            $userImages[$user->id] = $user->image ?? 'images/default_profile.png';
        }

        return view('admin', compact('users', 'userImages'));
    }
}
