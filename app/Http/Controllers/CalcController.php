<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function soma10($num)
    {
        // $soma = $num + 10;
        return view('soma10', compact('num'));
    }

    public function soma($num1, $num2)
    {
        return view('soma', compact('num1', 'num2'));
    }

    public function calculadora()
    {
        return view('calculadora');
    }

    public function calcular(Request $request)
    {
        $num1 = $request -> num1;
        $num2 = $request -> num2;
        return view('calcular', compact('num1', 'num2'));
    }


}
