<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        request()->validate([
            'comment' => "required",
        ]);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = Auth::id();
        $comment->blog_id = $blog->id;
        $comment->save();

        $subscribers = $blog->subscribers->filter(fn($subscriber)=> $subscriber->id != Auth::id());
        $subscribers->each(function($subscriber) use ($blog) {
            Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
        });

        return redirect('/blog/'.$blog->slug);
    }
}
