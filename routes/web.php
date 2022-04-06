<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Usuario2Controller;

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




Route::get('/', [CustomAuthController::class, 'login'])->middleware('estaLogado');

Route::get('/login', [CustomAuthController::class, 'login'])->middleware('estaLogado');
Route::get('/registration',[CustomAuthController::class, 'registration'])->middleware('estaLogado');
Route::post('/register-user',[CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user',[CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard',[CustomAuthController::class, 'dashboard'])->middleware('fazerLogin');

//Rota para Logout
Route::get('/logout', [CustomAuthController::class, 'logout']);



//Rota para o Admin
Route::get('/admin', [CustomAuthController::class, 'admin']);

//Rota para o Client
Route::get('/client', [CustomAuthController::class, 'client']);

//Rota para o Officer
Route::get('/officer', [CustomAuthController::class, 'officer']);

