<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProjectInner extends Component
{
/**
     * Create a new component instance.
     *
     * @return void
     */

    public $project;
    public $categories;
    public $general;
    public $recentnews;

    public function __construct($project,$general)
    {
        $this->project = $project;
        $this->general = $general;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.project-inner');
    }
}
