<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function getLogout () {
        Auth::logout();
        return redirect()->intended('admin/login');
    }
    public function getHome () {
         return view("backend.index");
    }
}
