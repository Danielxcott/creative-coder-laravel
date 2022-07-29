<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminBlogController;

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

Route::get('/', [BlogController::class,'index']);

// Route::get('/blog/{blog:slug}', [BlogController::class,'show'])->where('blog','[A-z\d\-_]+');
Route::get('/blog/{blog:slug}', [BlogController::class,'show']);
Route::post('/blog/{blog:slug}/comment',[CommentController::class,'store'])->name('comment.store');
Route::post('/blog/{blog:slug}/subscription',[BlogController::class,'subscribeHandler'])->name('blog.subscribe');

Route::get('/register',[AuthController::class,'create'])->name('register.create')->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->name('register.store')->middleware('guest');
Route::post('/logout',[AuthController::class,'logout'])->name('auth.logout')->middleware('auth');
Route::get('/login',[AuthController::class,'login'])->name('auth.login')->middleware('guest');
Route::post('/login',[AuthController::class,'check_login'])->name('auth.checkLogin')->middleware('guest');

Route::get('/admin/blog/create',[AdminBlogController::class,'create'])->name('blog.create')->middleware('isAdmin');
Route::post('/admin/blog/create',[AdminBlogController::class,'store'])->name('blog.store')->middleware('isAdmin');

Route::get('/admin/dashboard',[AdminBlogController::class,'index'])->middleware("auth")->name("admin.dashboard");
Route::delete('/admin/dashboard/{blog:slug}/delete',[AdminBlogController::class,'destroy'])->middleware("auth")->name("destroy.blog");
Route::get('/admin/dashboard/{blog:slug}/edit',[AdminBlogController::class,'edit'])->middleware("auth")->name("edit.blog");
Route::put('/admin/dashboard/{blog:slug}/update',[AdminBlogController::class,'update'])->middleware("auth")->name("update.blog");