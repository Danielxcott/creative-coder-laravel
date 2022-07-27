<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/blog/{blog:slug}', [BlogController::class,'show'])->where('blog','[A-z\d\-_]+');
Route::post('/blog/{blog:slug}/comment',[CommentController::class,'store'])->name('comment.store');

Route::get('/register',[AuthController::class,'create'])->name('register.create')->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->name('register.store')->middleware('guest');
Route::post('/logout',[AuthController::class,'logout'])->name('auth.logout')->middleware('auth');
Route::get('/login',[AuthController::class,'login'])->name('auth.login')->middleware('guest');
Route::post('/login',[AuthController::class,'check_login'])->name('auth.checkLogin')->middleware('guest');