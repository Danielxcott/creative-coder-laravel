<?php

namespace App\View\Components;

use App\Models\Comment;
use Illuminate\View\Component;

class CommentSection extends Component
{
    public $comments,$id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comments,$id)
    {
        $this->comments = $comments;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment-section',[
            'countComments'=> Comment::where('blog_id',$this->id)->count()
        ]);
    }
}
