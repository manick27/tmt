<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/home', 'home');

Route::view('/blog', 'blog/blog');

Route::view('/blog-details', 'blog/blog-details');

Route::view('/admin', '/admin/home');

Route::get('locale/{lang}', [App\Http\Controllers\LocalizationController::class, 'setLang'])->name('setlang');
