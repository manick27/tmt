<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use App\Models\Service;
use App\Models\User;
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
    $services = Service::limit(6)->get();
    $blogs = Blog::latest()->limit(3)->get()->reverse();
    return view('home', compact('services', 'blogs'));
 });

// Route::view('/home', 'home');

Route::view('/blog', 'blog/blog');

Route::view('/blog-details', 'blog/blog-details');

Route::view('/azerty', 'admin/verify_email');

Route::post('newsletters', [NewsletterController::class, 'store'])->name('newsletters');

Route::get('/home', [UserController::class, 'home'])->middleware(['auth', 'verified', 'is_admin']);

Route::get('/newsletters', [NewsletterController::class, 'index'])->middleware(['auth', 'verified', 'is_admin']);

//Les services

Route::get('/services', [ServiceController::class, 'index'])->middleware(['auth', 'verified', 'is_admin'])->name('services');

Route::get('/addService', [ServiceController::class, 'create'])->middleware(['auth', 'verified', 'is_admin']);

Route::post('/addService', [ServiceController::class, 'store'])->middleware(['auth', 'verified', 'is_admin'])->name('add.service');

Route::get('/update/service/{id}', [ServiceController::class, 'edit'])->middleware(['auth', 'verified', 'is_admin']);

Route::post('/update/service/{id}', [ServiceController::class, 'update'])->middleware(['auth', 'verified', 'is_admin'])->name('update.service');

Route::get('/delete/service/{id}', [ServiceController::class, 'delete'])->middleware(['auth', 'verified', 'is_admin'])->name('delete.service');

//Les blogs

Route::get('/blogs', [BlogController::class, 'index'])->middleware(['auth', 'verified', 'is_admin'])->name('blogs');

Route::get('/addBlog', [BlogController::class, 'create'])->middleware(['auth', 'verified', 'is_admin']);

Route::post('/addBlog', [BlogController::class, 'store'])->middleware(['auth', 'verified', 'is_admin'])->name('add.blog');

Route::get('/update/blog/{id}', [BlogController::class, 'edit'])->middleware(['auth', 'verified', 'is_admin']);

Route::post('/update/blog/{id}', [BlogController::class, 'update'])->middleware(['auth', 'verified', 'is_admin'])->name('update.blog');

Route::get('/blogs/service/{id}', [BlogController::class, 'blogsForService']);

Route::get('/blog/{id}/details', [BlogController::class, 'blogDetails']);

Route::get('/delete/blog/{id}', [BlogController::class, 'delete'])->middleware(['auth', 'verified', 'is_admin'])->name('delete.blog');

// Les commentaires

Route::post('/comment/blog/{id}', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comment.blog');

// Les users

Route::get('users', [UserController::class, 'index'])->middleware(['auth', 'verified', 'is_admin'])->name('users');

Route::get('user/is/admin/{id}', [UserController::class, 'admin'])->middleware(['auth', 'verified', 'is_admin'])->name('user.is.admin');

Route::get('user/isnot/admin/{id}', [UserController::class, 'notAdmin'])->middleware(['auth', 'verified', 'is_admin'])->name('user.isnot.admin');

Route::get('/show/user/{id}', [UserController::class, 'show'])->middleware(['auth', 'verified', 'is_admin']);

Route::get('/myProfile', [UserController::class, 'myProfile'])->middleware(['auth', 'verified', 'is_admin']);

Route::get('/edit/myProfile', [UserController::class, 'editMyProfile'])->middleware(['auth', 'verified', 'is_admin']);

Route::post('/update/my/profile', [UserController::class, 'update'])->middleware(['auth', 'verified', 'is_admin'])->name('update.my.profile');

// Les messages

Route::post('/send/message', [MessageController::class, 'store'])->name('send.message');

Route::get('/messages', [MessageController::class, 'index'])->middleware(['auth', 'verified', 'is_admin']);

//Changement de langue

Route::get('locale/{lang}', [LocalizationController::class, 'setLang'])->name('setlang');
