<?php

namespace App\View\Components;

use App\Models\Content\News;
use App\Models\Content\Slider;
use Illuminate\View\Component;
use App\Models\Content\Partner;
use App\Models\Content\Project;
use App\Models\ProductCategory;
use Palindroma\Core\Http\Resources\ContentResource;

class Homepage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $slides;
    public $projects;
    public $partners;
    public $news;
    public $categories;

    public function __construct(public $content)
    {
        $sliderIds = data_get($content, 'slider');
        $projectIds = data_get($content, 'projects');
        $partnerIds = data_get($content, 'partners');
        $newsIds = data_get($content, 'news');

        $this->slides = ContentResource::collection(Slider::whereIn('id', $sliderIds)->get())->response()->getData()->data;
        $this->categories = ContentResource::collection(ProductCategory::where('parent_id', -1)->orderBy('order')->get())->response()->getData()->data;
        $this->projects = ContentResource::collection(Project::whereIn('id', $projectIds)->get())->response()->getData()->data;
        $this->partners = ContentResource::collection(Partner::whereIn('id', $partnerIds)->get())->response()->getData()->data;
        $this->news = ContentResource::collection(News::whereIn('id', $newsIds)->get())->response()->getData()->data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.homepage');
    }
}
