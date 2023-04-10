<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login/user', [LoginController::class, 'showUserLogin'])->name('user.login');
Route::get('/login/customer', [LoginController::class,'showCustomerLogin'])->name('customer.login');
Route::get('/register/user', [RegisterController::class,'showUserRegisterForm'])->name('user.register');
Route::get('/register/customer', [RegisterController::class,'showCustomerRegisterForm'])->name('customer.register');
Route::post('/login/user', [LoginController::class,'userLogin'])->name('user.login.submit');
Route::post('/login/customer', [LoginController::class,'customerLogin'])->name('customer.login.submit');
Route::post('/register/user', [RegisterController::class,'createUser'])->name('user.register.submit');
Route::post('/register/customer', [RegisterController::class,'createCustomer'])->name('customer.register.submit');

Route::group(['middleware' => 'auth:customer'], function () {
 Route::view('/customerDashBoard', 'customer');
});
Route::group(['middleware' => 'auth:user'], function () {

 Route::view('/dashboard', 'user');
});
Route::get('logout', [LoginController::class,'logout']);

Route::resource('carts', cartController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/customerDashboard', [CustomerDashboardController::class, 'index'])->middleware('auth')->name('customerDashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
