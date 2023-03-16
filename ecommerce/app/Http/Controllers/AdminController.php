<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Hash;
use Illuminate\Support\Facades\Auth;
use Hash;
class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function makeLogin(Request $request)
    {

        $data = array(
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'admin'
        );

        if (Auth::attempt($data)) {
            return view('admin.dashboard');
        } else {
            return back()->withErrors(['message' => 'invalid email or password']);
        }
    }
}
