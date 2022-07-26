<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogsYouMayLike extends Component
{
    public $randomBlogs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($randomBlogs)
    {
        $this->randomBlogs = $randomBlogs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blogs-you-may-like');
    }
}
