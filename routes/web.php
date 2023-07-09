<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});

// Route::view('/home', 'home');

Route::view('/blog', 'blog/blog');

Route::view('/blog-details', 'blog/blog-details');

Route::view('/azerty', 'admin/verify_email');

Route::view('/home', '/admin/home')->middleware(['auth', 'verified']);

Route::get('locale/{lang}', [LocalizationController::class, 'setLang'])->name('setlang');
