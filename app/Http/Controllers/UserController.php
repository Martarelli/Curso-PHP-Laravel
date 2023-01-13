<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signin(Request $request)
    {
        $credentials = [
            'email' => $request -> email,
            'password' => $request -> password,
        ];

        if(auth() -> attempt($credentials)){
            return redirect('/');
        }

        return back();
    }
}
