<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Palindroma\Core\Models\Tag;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use App\Models\Content\News as ModelNews;
use Palindroma\Core\Http\Resources\ContentResource;

class News extends AbstractComponent
{
    public $news;
    public $categories;
    public $categoryId;
    public $keyword;

    protected $queryString = ['categoryId'];

    public function mount(){

        $this->categories = ContentResource::collection(Tag::where('type', 'blog_category')->get())->response()->getData()->data;

        if(!cache::get('news_' . App::getLocale())){
            Cache::put('news_' . App::getLocale(), ContentResource::collection(ModelNews::orderBy('published_at')->get())->response()->getData()->data, 3000);
        }

        $this->news = cache::get('news_' . App::getLocale());

    }

    public function setCategoryId($id){
       $this->categoryId = $id;
    }

    public function getFilteredNews(){

        return collect($this->news)->sortByDesc('published_at')
            ->when($this->categoryId !== null, function ($collection)  {
                return $collection->filter(function ($value) {
                    return ((int)data_get($value, 'category_id') === (int)$this->categoryId);
                });
            })
            ->when($this->keyword !== null, function ($query) {
                return $query->where('title', 'like', '%'.$this->keyword.'%');
            })
        ->all();

    }

    public function render()
    {
        return view('livewire.news', ['newsList' => $this->getFilteredNews()]);
    }
}
