<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use App\Models\Content\News as ModelNews;
use Palindroma\Core\Filament\Resources\ContentResource;

class NewsInner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $news;
    public $categories;
    public $general;
    public $recentnews;

    public function __construct($news,$categories,$general,$recentnews)
    {
        $this->news = $news;
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
        return view('components.news-inner');
    }
}
