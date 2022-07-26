<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
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

Route::get('/', function () {
    $blogs = Blog::with(['category','author'])->latest()->get();
    return view('blogs',[
        'blogs' => $blogs,
    ]);
});

Route::get('/blog/{blog:slug}', function (Blog $blog) 
{
    return view('blog',[
        'blog' => $blog
    ]);
})->where('blog','[A-z\d\-_]+');

Route::get('/categories/{category:slug}',function(Category $category){
        return view('blogs',[
            'blogs'=> $category->blogs->load('category','author'),
        ]);
});

Route::get('/user/{user:username}',function(User $user){
    return view('blogs',[
        'blogs'=> $user->blogs->load('category','author'),
    ]);
});
