<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        logger()->debug('Aqui é um log!');

        return 'Hello world!';
    }
}
