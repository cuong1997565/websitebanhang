<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function getLogin () {
         return view('backend.login');
    }
    public function postLogin (Request $request) {
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        //checkbox
        if($request->remember = 'Remember Me'){
            $remember = true; 
        }
        else {
            $remember = false;
        }
        if(Auth::attempt($arr, $remember)) {
            return redirect()->intended('admin/admin-backend/home');
        } else {
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu chưa đúng');
        }
    }
}
