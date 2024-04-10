<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\ProductCategory;
use App\Models\Ecommerce\Product;
use Palindroma\Core\Http\Resources\ContentResource;

class Products extends AbstractComponent
{

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
        $this->childCategories = ContentResource::collection(ProductCategory::where('parent_id', $id)->get())->response()->getData()->data;
    }

    public function render()
    {
        return view('livewire.products');
    }
}
