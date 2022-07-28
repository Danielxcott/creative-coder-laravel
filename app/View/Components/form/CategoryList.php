<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class CategoryList extends Component
{
    public $title,$categories,$value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$categories,$value="")
    {
        $this->title = $title;
        $this->categories = $categories;
        $this->value = $value;
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
