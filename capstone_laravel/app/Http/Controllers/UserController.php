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
        $this->middleware('auth'); 
        $this->displayProfile1(); 
    }

    public function displayProfile1()
    {
        $userData = User::find(auth()->id());
        $userImage = UserPreferences::where('user_id', auth()->id())->first();
        $userTimetable = UserPreferences::where('user_id', auth()->id())->first();
        return view('profile1', compact('userData', 'userImage', 'userTimetable'));
    }

    public function softDelete($id)
    {
        $user = User::findOrFail($id);
        $user->deleted = true; 
        $user->save();

        return redirect()->route('login')->with('success', 'User soft deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', '%' . $query . '%')->get();
        $userData = [];
        foreach ($users as $user) {
            $userData[$user->id] = UserPreferences::where('user_id', $user->id)->first();
        }

        return view('search', compact('users', 'query', 'userData'));
    }


    public function resetPassword(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'new_password' => ['required', 'min:8', 'max:30', 'confirmed'],
        ]);

        $user = User::findOrFail($request->user_id);
        $user->password = bcrypt($request->new_password); 
        $user->save();

        return redirect()->back()->with('success', 'Password reset successfully!');
    }
}
