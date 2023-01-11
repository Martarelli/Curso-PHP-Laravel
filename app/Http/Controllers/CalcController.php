<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function soma10($num)
    {
        // $soma = $num + 10;
        return view('soma', compact('num'));
    }
}
