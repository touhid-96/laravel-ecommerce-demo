<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect() {
        $userType = Auth::user() -> user_type;

        if ($userType == '1') {
            return view('admin.home');
        } else {
            return view('user.home');
        }
    }

    public function index() {
        /**
         * Quick explanation:
         * we are starting form index method.
         * after going through login/registration -> we are calling redirect method
         * that's why we need to redirect the route here
         *
         * Auth::id() means : check if someone logged in or not
         */
        if (Auth::id()) {
            return redirect('redirect');
        } else {
            return view('user.home');
        }
    }
}
