<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Palindroma\Core\Models\Page;
use App\Models\Ecommerce\Product;
use Palindroma\Core\Http\Resources\PageResource;
use Palindroma\Core\Http\Resources\ContentResource;
use Palindroma\Core\Http\Resources\NavigationResource;
use RyanChandler\FilamentNavigation\Models\Navigation;

class InnersController extends Controller
{
    public function product($locale,$id){
        $additional = [];
        $additional['navigations'] = NavigationResource::collection(Navigation::all());

        $page = Page::first();

        $page = PageResource::make($page)->additional($additional)->response()->getData();

        $product = Arr::first(ContentResource::collection(Product::where('id', $id)->get())->response()->getData()->data);

        $categories = collect(ContentResource::collection(ProductCategory::all())->response()->getData()->data)->pluck('parent_id', 'id');

        return view('product', ['product' => $product, 'page' => $page, 'categories' => $categories]);
    }
}
