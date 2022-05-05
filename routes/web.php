<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SliderController;
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

//
Route::get('/', [\App\Http\Controllers\FrontendController::class, 'index']);
Route::get('/about', [\App\Http\Controllers\FrontendController::class, 'about']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('dashboard.profile');
Route::post('change/name', [App\Http\Controllers\HomeController::class, 'changename']);
Route::post('change/password', [App\Http\Controllers\HomeController::class, 'changepassword']);
Route::post('change/photo', [App\Http\Controllers\HomeController::class, 'changephoto']);

Route::post('change/coverphoto', [App\Http\Controllers\HomeController::class, 'changecoverphoto']);
Route::resource('category', CategoryController::class);
Route::resource('slider', SliderController::class);
Route::resource('product', ProductController::class);
