<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Content\Project;
use Palindroma\Core\Http\Resources\ContentResource;

class Projects extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $projects;

    public function __construct(public $content)
    {
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.projects');
    }
}
