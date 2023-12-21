<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function addAccount(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|max:16',
        ], [
            'name.unique' => 'The name is already taken',
            'email.unique' => 'The email is already taken'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->save();
        $request->session()->flash('success', 'Account successfully created!');
        return redirect()->route('login');
    }
}
