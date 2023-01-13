<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index']) -> middleware('auth');

Route::get('/create', [ProductController::class, 'create']) -> middleware('auth');
Route::post('/store', [ProductController::class, 'store']) -> middleware('auth');

Route::get('/show/{id}', [ProductController::class, 'show']) -> middleware('auth');

Route::get('/edit/{id}', [ProductController::class, 'edit']) -> middleware('auth');
Route::post('/update/{id}', [ProductController::class, 'update']) -> middleware('auth');

Route::post('/destroy/{id}', [ProductController::class, 'destroy']) -> middleware('auth');


//Rotas de autenticação
Route::get('/login', [UserController::class, 'login']) -> name('login');
Route::post('/signin', [UserController::class, 'signin']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/signup', [UserController::class, 'signup']);
