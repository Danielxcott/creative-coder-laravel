<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class CategoryList extends Component
{
    public $title,$categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$categories)
    {
        $this->title = $title;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.category-list');
    }
}
