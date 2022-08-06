<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Auth;


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

Route::middleware(['middleware'=>'preventBackHistory'])->group(function(){
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','preventBackHistory'],'as'=>'admin.'], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});

Route::group(['prefix'=>'reviewer','middleware'=>['isReviewer','auth','preventBackHistory'],'as'=>'reviewer.'], function(){
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/settings', [UserController::class, 'settings'])->name('settings');
});
