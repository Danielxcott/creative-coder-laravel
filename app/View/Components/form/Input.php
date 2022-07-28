<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class Input extends Component
{
    public $title,$type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$type="text")
    {
        $this->title = $title;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
