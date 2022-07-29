<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest('id')->paginate(6);
        return view("admin.blogs.index",compact(['blogs']));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blog.create',compact('categories'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required','string','min:3'],
            'slug' => ['required','string',Rule::unique('blogs','slug')],
            'description' => ['required','string'],
            'category' => ['required',Rule::exists('categories','id')],
            'thumbnail' => 'mimes:jpg,bmp,png',
        ]);
        $file = request()->file('thumbnail');
        $newName = uniqid().".".$file->getClientOriginalExtension();
        $file->storeAs("public/thumbnail",$newName);
    
        $blog = new Blog();
        $blog->title = $request->title;
        if($blog->slug == $request->slug){
        $blog->slug = Str::slug($request->slug).".".uniqid();
        }
        $blog->slug = Str::slug($request->slug).".".uniqid();
        $blog->thumbnail = $newName;
        $blog->description = $request->description;
        $blog->excerpt = Str::words($blog->description,50);
        $blog->user_id = Auth::id();
        $blog->category_id = $request->category;
        $blog->save();
        return redirect('/');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit',compact(["blog","categories"]));
    }

    public function update(Request $request, Blog $blog)
    {
        request()->validate([
            'title' => "required|string|min:30",
            'slug' => "required|string|".Rule::unique('blogs','slug')->ignore($blog->id),
            'description' => "required|string",
            'category' => "required|".Rule::exists('categories','id'),
            'thumbnail' => "mimes:jpg,bmp,png",
        ]);

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->slug);
        if(request()->hasFile('thumbnail')){
            Storage::delete('public/thumbnail/'.$blog->thumbnail);
            $file = request()->file('thumbnail');
            $newName = uniqid().".".$file->getClientOriginalExtension();
            $file->storeAs("public/thumbnail",$newName);
            $blog->thumbnail = $newName;
        }else{
            $blog->thumbnail = $blog->thumbnail;
        }
        $blog->description = $request->description;
        $blog->excerpt = Str::words($blog->description,50);
        $blog->user_id = Auth::id();
        $blog->category_id = $request->category;
        $blog->update();
        return redirect()->route('admin.dashboard');
    }

    public function destroy(Blog $blog)
    {
        if($blog->thumbnail != null){
        Storage::delete("public/thumbnail/".$blog->thumbnail);
        }        
        $blog->delete();
        return back();
    }
}
