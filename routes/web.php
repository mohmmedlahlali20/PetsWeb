<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//login
Route::get('/login', [AuthController::class, 'LoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
//register

Route::get('/register', [AuthController::class, 'RegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'Register'])->name('register');

Route::get('/login', function () {
    return view('auth.login');
});
