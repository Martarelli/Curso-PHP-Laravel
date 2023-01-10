<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function principal()
    {
        return view('index');
    }

    public function sobre()
    {
        return view('sobre');
    }
}
