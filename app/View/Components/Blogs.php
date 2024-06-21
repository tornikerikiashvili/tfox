<?php

namespace App\View\Components;

use App\Models\Content\BlogTwo as ModelBlogs;
use Illuminate\View\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Palindroma\Core\Http\Resources\ContentResource;

class Blogs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $newsList;
    public $recentnews;
    public $categories;
    public $categoryId;
    public $keyword;


    public function __construct(public $content)
    {
        if(!cache::get('blogs_' . App::getLocale())){
            Cache::put('blogs_' . App::getLocale(), ContentResource::collection(ModelBlogs::orderBy('published_at')->get())->response()->getData()->data, 3000);
        }

        $this->newsList = cache::get('blogs_' . App::getLocale());

        $this->recentnews = collect(cache::get('news_' . App::getLocale()))->filter(function ($item) {
            return data_get($item, 'is_published') === true;
        })->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blogs');
    }
}
