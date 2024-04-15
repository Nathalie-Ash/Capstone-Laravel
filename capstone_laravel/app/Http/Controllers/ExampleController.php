<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function dashboard() {
        return view('dashboard');
    }

    public function connections() {
        return view('connections');
    }

    public function ppp() {
        return view('ppp');
    }

    public function profile1() {
        return view('profile1');
    }

    public function profile2() {
        return view('profile2');
    }

    public function requests() {
        return view('requests');
    }

    public function sign2() {
        return view('sign2');
    }
    public function signup() {
        return view('signup');
    }

    public function step1() {
        return view('step1');
    }
    public function step2() {
        return view('step2');
    }
    public function step3() {
        return view('step3');
    }
    public function step4() {
        return view('step4');
    }
    public function userProfile() {
        return view('userProfile');
    }

    public function contact() {
        return view('contact');
    }
}
