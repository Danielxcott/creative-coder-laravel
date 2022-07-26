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
    $blogs = Blog::when(request('search'),function($q){
        $search = request("search");
        $q->orWhere("title","like","%$search%")
        ->orWhere("description","like","%$search%");
    })
    ->with(['category','author'])
    ->latest()
    ->get();
    return view('blogs',[
        'blogs' => $blogs,
        'categories' => Category::all(),
    ]);
});

Route::get('/blog/{blog:slug}', function (Blog $blog) 
{
    return view('blog',[
        'blog' => $blog,
        'randomBlogs' => Blog::inRandomOrder()->take(3)->get(),

    ]);
})->where('blog','[A-z\d\-_]+');

Route::get('/categories/{category:slug}',function(Category $category){
        return view('blogs',[
            'blogs'=> $category->blogs->load('category','author'),
            'categories' => Category::all(),
            'currentCategory' => $category,
        ]);
});

Route::get('/user/{user:username}',function(User $user){
    return view('blogs',[
        'blogs'=> $user->blogs->load('category','author'),
        'categories' => Category::all(),
    ]);
});
