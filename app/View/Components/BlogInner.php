<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogInner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $blog;
    public $categories;
    public $general;
    public $recentnews;

    public function __construct($blog,$categories,$general,$recentnews)
    {
        $this->blog = $blog;
        $this->categories = $categories;
        $this->general = $general;
        $this->recentnews = $recentnews;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-inner');
    }
}
