<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\ProductCategory;
use Palindroma\Core\Models\Tag;
use App\Models\Ecommerce\Product;
use Illuminate\Support\Facades\App;
use Palindroma\Core\Http\Resources\ContentResource;

class Products extends AbstractComponent
{
    public $content;

    public $category = 5;
    public $categories;
    public $currentCategory;
    public $products;
    public $children;
    public $childCategories = [];
    public $filter;
    public $brands;
    public $brand;
    protected $queryString = ['category','children','filter', 'brand'];

    public function mount(){
        $this->currentCategory = ContentResource::collection(ProductCategory::where('id', $this->category)->orderBy('order')->get())->response()->getData()->data;
        $this->categories = ContentResource::collection(ProductCategory::where('parent_id', $this->category)->orderBy('order')->get())->response()->getData()->data;
        $catIds = collect($this->categories)->pluck('id');

        $this->childCategories = ContentResource::collection(ProductCategory::where('parent_id', $this->children)->get())->response()->getData()->data;

        if($this->brand){
            if(!empty($this->childCategories)){
                $childCatIds = collect($this->childCategories)->pluck('id');
                $this->products = ContentResource::collection(Product::whereIn('category_id', $childCatIds)->where('brand_id', $this->brand)->where('metadata->is_published', true)->get())->response()->getData()->data;
            } else {
                $this->products = ContentResource::collection(Product::whereIn('category_id', $catIds)->where('brand_id', $this->brand)->where('metadata->is_published', true)->get())->response()->getData()->data;
            }
        } else {
            if(!empty($this->childCategories)){
                $childCatIds = collect($this->childCategories)->pluck('id');
                $this->products = ContentResource::collection(Product::whereIn('category_id', $childCatIds)->where('metadata->is_published', true)->get())->response()->getData()->data;
            } else {
                $this->products = ContentResource::collection(Product::whereIn('category_id', $catIds)->where('metadata->is_published', true)->get())->response()->getData()->data;
            }
        }

        $currentCat = ContentResource::collection(ProductCategory::where('id', $this->category)->get())->response()->getData()->data;

        $brandIds = data_get(Arr::first($currentCat), 'metadata.brands');
        if($brandIds){
            $this->brands = ContentResource::collection(Tag::whereIn('id', $brandIds)->get())->response()->getData()->data;
        } else {
            $this->brands = [];
        }



    }

    public function setBrandId($id){
        $this->brand = $id;
        return redirect(env('APP_URL') .'/'. App::getlocale() . '/products?' . http_build_query([
            'category' => $this->category,
            'children' => $this->children,
            'brand' => $this->brand
        ]));
    }


    public function setCatCat($id){
        $this->filter = $id;
    }

    public function setChildren($id){
        $this->children = $id;
        return redirect(env('APP_URL') .'/'. App::getlocale() . '/products?' . http_build_query([
            'category' => $this->category,
            'children' => $this->children,
            'brand' => $this->brand
        ]));
    }

    public function clearFilter(){
        return redirect(env('APP_URL') .'/'. App::getlocale() . '/products?' . http_build_query([
            'category' => $this->category,
            'children' => $this->children,
            'brand' => null
        ]));
    }


    public function render()
    {
        return view('livewire.products');
    }
}
