<?php

namespace App\Http\Controllers;

use App\Models\UserPreferences;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{
    public function storeStep1(Request $request)
    {
        $incomingFields = $request->all();
        logger($incomingFields); // Log the incoming data
    
        $validatedData = $request->validate([
            'school'=> 'required',
            'major' => 'required',
            'minor'=> 'required',
            'campus'=> 'required',
        ]);
    
        UserPreferences::create($validatedData);
        return "Hello from the register function";
    }
    
}
