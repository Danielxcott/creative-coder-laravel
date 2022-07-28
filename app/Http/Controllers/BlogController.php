<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blogs',[
            'blogs' => $this->getBlogs(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required','string','min:3'],
            'slug' => ['required','string',Rule::unique('blogs','slug')],
            'description' => ['required','string'],
            'category' => ['required',Rule::exists('categories','id')],
            'thumbnail' => 'required|mimes:jpg,bmp,png',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog',[
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get(),
    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function getBlogs()
    {
        $blogs = Blog::latest()->filter(request(['search','category','username']))   //string to array ,use []
        ->with(['category','author'])
        ->paginate(6)
        ->withQueryString();
        return $blogs;
    }

    public function subscribeHandler(Blog $blog)
    {
        if(User::find(Auth::id())->isSubscribe($blog))
        {
            $blog->unSubscribe();
        }else{
            $blog->subscribe();
        }
        return back();
    }
}
