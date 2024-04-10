<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\ProductCategory;
use App\Models\Ecommerce\Product;
use Illuminate\Support\Facades\App;
use Palindroma\Core\Http\Resources\ContentResource;

class Products extends AbstractComponent
{
    public $content;

    public $category = 5;
    public $categories;
    public $products;
    public $children;
    public $childCategories = [];
    protected $queryString = ['category','children'];

    public function mount(){
        $this->categories = ContentResource::collection(ProductCategory::where('parent_id', $this->category)->orderBy('order')->get())->response()->getData()->data;
        $catIds = collect($this->categories)->pluck('id');

        $this->childCategories = ContentResource::collection(ProductCategory::where('parent_id', $this->children)->get())->response()->getData()->data;

        if(!empty($this->childCategories)){
            $childCatIds = collect($this->childCategories)->pluck('id');
            $this->products = ContentResource::collection(Product::whereIn('category_id', $childCatIds)->get())->response()->getData()->data;
        } else {
            $this->products = ContentResource::collection(Product::whereIn('category_id', $catIds)->get())->response()->getData()->data;
        }
    }



    public function setChildren($id){
        $this->children = $id;
        return redirect(env('APP_URL') .'/'. App::getlocale() . '/products?' . http_build_query([
            'category' => $this->category,
            'children' => $this->children,
        ]));
    }

    // public function filterByType($uuid){
    //     $this->link_department = $uuid;

    //     return redirect(env('APP_URL') .'/'. App::getlocale() . '/announcements?' . http_build_query([
    //         'sort' => $this->sort,
    //         'type' => $uuid,
    //         'cat' => $this->cat,
    //         'loc' => $this->loc,
    //         'keyword' => $this->keyword,
    //         'val' => $this->val
    //     ]));
    // }

    public function render()
    {
        return view('livewire.products');
    }
}
