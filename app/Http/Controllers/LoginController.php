<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            Session::flash('success', 'Login Successfully');
            return redirect('/todolist');
        } else {
            return view('loginPage', ['error' => 'Invalid login credentials']);
        }
    }

    public function logout() {
        Auth::logout();

        Session::flash('success', 'Logged out Successfully');
        return redirect('/');
    }
}
