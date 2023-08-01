<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect() {
        $userType = Auth::user() -> user_type;

        if ($userType == '1') {
            return view('admin.home');
        } else if ($userType == '0') {
            return view('user.home');
        } else {
            return "user type error!";
        }
    }

    public function index() {
        return view('user.home');
    }
}
