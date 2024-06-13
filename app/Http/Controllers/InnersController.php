<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Models\Content\News;
use Illuminate\Http\Request;
use App\Models\Content\Project;
use App\Models\ProductCategory;
use Palindroma\Core\Models\Tag;
use Palindroma\Core\Models\Page;
use App\Models\Ecommerce\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use App\Settings\CommunicationsSettings;
use App\Models\Content\News as ModelNews;
use Palindroma\Core\Settings\GeneralSettings;
use Palindroma\Core\Http\Resources\PageResource;
use Palindroma\Core\Http\Resources\ContentResource;
use Palindroma\Core\Http\Resources\NavigationResource;
use RyanChandler\FilamentNavigation\Models\Navigation;

class InnersController extends Controller
{
    public function product($locale,$slug){
        $additional = [];
        $additional['navigations'] = NavigationResource::collection(Navigation::all());
        $additional['communications'] = app(CommunicationsSettings::class)->toArrayForFrontend();
        $additional['settings'] = app(GeneralSettings::class)->toArrayForFrontend();

        $page = Page::first();

        $page = PageResource::make($page)->additional($additional)->response()->getData();

        $product = Arr::first(ContentResource::collection(Product::where('slug', $slug)->get())->response()->getData()->data);

        $categories = collect(ContentResource::collection(ProductCategory::all())->response()->getData()->data)->pluck('parent_id', 'id');

        return view('product', ['product' => $product, 'page' => $page, 'categories' => $categories]);
    }

    public function news($locale,$slug){
        $additional = [];
        $additional['navigations'] = NavigationResource::collection(Navigation::all());
        $additional['communications'] = app(CommunicationsSettings::class)->toArrayForFrontend();
        $additional['settings'] = app(GeneralSettings::class)->toArrayForFrontend();

        $page = Page::first();

        $page = PageResource::make($page)->additional($additional)->response()->getData();

        $news = Arr::first(ContentResource::collection(News::where('slug', $slug)->get())->response()->getData()->data);

        $categories = ContentResource::collection(Tag::where('type', 'blog_category')->get())->response()->getData()->data;


        if(!cache::get('news_' . App::getLocale())){
            Cache::put('news_' . App::getLocale(), ContentResource::collection(ModelNews::orderBy('published_at')->get())->response()->getData()->data, 3000);
        }


        $recentnews = collect(cache::get('news_' . App::getLocale()))->filter(function ($item) {
            return data_get($item, 'is_published') === true;
        })->all();

        return view('news-inner', ['news' => $news, 'page' => $page, 'categories' => $categories, 'recentnews' => $recentnews]);
    }



    public function project($locale,$slug){
        $additional = [];
        $additional['navigations'] = NavigationResource::collection(Navigation::all());
        $additional['communications'] = app(CommunicationsSettings::class)->toArrayForFrontend();
        $additional['settings'] = app(GeneralSettings::class)->toArrayForFrontend();

        $page = Page::first();

        $page = PageResource::make($page)->additional($additional)->response()->getData();

        $project = Arr::first(ContentResource::collection(Project::where('slug', $slug)->get())->response()->getData()->data);

        $categories = ContentResource::collection(Tag::where('type', 'blog_category')->get())->response()->getData()->data;

        return view('project-inner', ['project' => $project, 'page' => $page, 'categories' => $categories]);
    }
}
