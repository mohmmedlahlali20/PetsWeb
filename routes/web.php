<?php

use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommendsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AccessoirController;
use App\Http\Controllers\SocialiteController;
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

Route::get('/', function(){
  return view('firstPage');
});




Route::resource('/Home', ProductsController::class);
Route::resource('/Commandes', CommendsController::class);
Route::resource('/commentes', CommentsController::class);
Route::get('/payments' , [PaymentsController::class, 'AllPayment'])->name('payment');
Route::resource('/accessoir', AccessoirController::class);
Route::post('/Commandes', [CommendsController::class, 'store'])->name('command');
Route::post('/commentair', [CommentsController::class, 'store'])->name('commentes');
//Route::post('/Food/{id}/commentes',[CommentsController::class, 'CommentsForFoods'])->name('commentes.foods');
Route::post('/foods/{id}/comments', [CommentsController::class, 'storeCommentForFood'])->name('foods.comments.store');
Route::get('/foods/{id}/comments', [CommentsController::class, 'CommentsForFoods'])->name('foods.comments');

// Route Definition
Route::post('/accessoir/{id}/comments', [CommentsController::class, 'CommentsForAccessoir'])->name('accessoir.comments.store');
Route::get('/accessoir/{id}/comments', [CommentsController::class, 'storeCommentForAccessoir'])->name('accessoir.comments');



Route::get('/checkout' , [PaymentsController::class , 'index'])->name('GetPayment');
Route::post('/checkout', [PaymentsController::class, 'checkout'])->name('striptPayment');
Route::get('/checkout/success', [PaymentsController::class, 'success'])->name('success'); 

Route::post('/Commandes/foods', [CommendsController::class, 'storeFood'])->name('order.food');
//Route::post('/order/pets', [CommendsController::class, 'storePets'])->name('order.pets');
Route::post('/order/accessoir', [CommendsController::class, 'storeAccessoir'])->name('order.accessoir');
Route::post('/Home' , [ProductsController::class, 'likeProduct'])->name('like.product');                                       
Route::resource('/Food', FoodController::class);


Route::middleware(['auth' , 'admin'])->group(function () {
  Route::resource('/category' , CategoriesController::class);

  Route::resource('/product', AdminController::class);


  Route::get('/Accessoir' , [AccessoirController::class, 'create'])->name('accessoir.name');
  Route::post('/Accessoir', [AccessoirController::class, 'store'])->name('accessoirs.store');
  Route::get('/Accessory' , [AccessoirController::class, 'getAccessoir'])->name('accessory');
  Route::delete('/Accessoir/{accessoir}', [AccessoirController::class, 'destroy'])->name('accessoir.destroy');
  Route::delete('/Food-data/{food}', [FoodController::class, 'destroy'])->name('food.destroy');
  Route::delete('/all-commends/{id}', [AdminController::class, 'AdminCancelCommand'])->name('admin.destroy');
  Route::get('/food' ,[FoodController::class, 'create'])->name('create');
  Route::get('/Food-data' ,  [FoodController::class , 'GetFood'])->name('food');
  Route::resource('/user', UserController::class);
  Route::get('/all-commends' , [AdminController::class,  'GetCommands'])->name('get.command');
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
    Route::get('/profile', [AuthController::class, 'Profile'])->name('profile');
});











Route::get('/auth/{Provider}/redirect',[SocialiteController::class , 'redirect']);

Route::get('/auth/{Provider}/callback', [SocialiteController::class , 'callback']);
