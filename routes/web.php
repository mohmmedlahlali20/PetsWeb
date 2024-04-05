<?php

use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommendsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AccessoirController;
use App\Http\Controllers\CategoriesController;

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
// Route::get('/Commandes', [CommendsController::class, 'index']);

Route::resource('/Home', ProductsController::class);
Route::resource('/Commande', CommendsController::class);
Route::resource('/commentes', CommentsController::class);
Route::get('/payments' , [PaymentsController::class, 'AllPayment'])->name('payment');

//Route::get('/commente/{id}', [ProductsController::class, 'show'])->name('show');

Route::post('/Commandes', [CommendsController::class, 'store'])->name('command');
Route::post('/commentair', [CommentsController::class, 'store'])->name('commentes');


Route::middleware(['auth' , 'admin'])->group(function () {
  Route::resource('/category' , CategoriesController::class);
  Route::resource('/product', AdminController::class);
  //Route::get('/Commend', [AdminController::class, 'GetCommands'])->name('GetCommand');
  //Route::put('/commands/{commend}', [CommendsController::class , 'update'])->name('command.update');
  Route::resource('user', UserController::class);
  //Route::get('/products', [AdminController::class, 'getStats'])->name('stats');
});

//payment 

Route::get('/checkout' , [PaymentsController::class , 'index'])->name('GetPayment');
Route::post('/checkout', [PaymentsController::class, 'checkout'])->name('striptPayment');
Route::get('/commend', [PaymentsController::class, 'success'])->name('success');



Route::get('/', function(){
  return view('firstPage');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::Post('/Logout', [AuthController::class, 'Logout'])->name('logout');
    Route::get('/Forget-password', [AuthController::class, 'Forget'])->name('forget.password');
    Route::post('/Forget-password', [AuthController::class, 'ForgetPassword'])->name('forget');
    Route::get('/reset-password/{token}' , [AuthController::class, 'resetPassword'])->name('reset.password');
    Route::post('/reset-password' , [AuthController::class, 'ResetPasswordPost'])->name('reset.password.post');
});
