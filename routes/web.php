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
    $services = Service::all();
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

Route::get('/add/service', [ServiceController::class, 'create'])->middleware(['auth', 'verified', 'is_admin']);

Route::post('/add/service', [ServiceController::class, 'store'])->middleware(['auth', 'verified', 'is_admin'])->name('add.service');

Route::get('/service/{id}/update', [ServiceController::class, 'edit'])->middleware(['auth', 'verified', 'is_admin']);

Route::post('/service/{id}/update', [ServiceController::class, 'update'])->middleware(['auth', 'verified', 'is_admin'])->name('service.update');

Route::get('/service/{id}/delete', [ServiceController::class, 'delete'])->middleware(['auth', 'verified', 'is_admin'])->name('service.delete');

//Les blogs

Route::get('/blogs', [BlogController::class, 'index'])->middleware(['auth', 'verified', 'is_admin'])->name('blogs');

Route::get('/add/blog', [BlogController::class, 'create'])->middleware(['auth', 'verified', 'is_admin']);

Route::post('/add/blog', [BlogController::class, 'store'])->middleware(['auth', 'verified', 'is_admin'])->name('add.blog');

Route::get('/blog/{id}/update', [BlogController::class, 'edit'])->middleware(['auth', 'verified', 'is_admin']);

Route::post('/blog/{id}/update', [BlogController::class, 'update'])->middleware(['auth', 'verified', 'is_admin'])->name('blog.update');

Route::get('/service/{id}/blogs', [BlogController::class, 'blogsForService']);

Route::get('/blog/{id}/details', [BlogController::class, 'blogDetails']);

Route::get('/blog/{id}/delete', [BlogController::class, 'delete'])->middleware(['auth', 'verified', 'is_admin'])->name('blog.delete');

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
