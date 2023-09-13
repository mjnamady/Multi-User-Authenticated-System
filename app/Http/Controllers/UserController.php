<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Return user login page
    public function userLogin(){
        return view('user.user_login');
    } // End method

    public function userRegister(){
        return view('user.user_register');
    }

    public function UserLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully!',
            'alert-type' => 'warning'
        );

        return redirect('/user/login')->with($notification);
    } // Logout Admin Ends...

}
