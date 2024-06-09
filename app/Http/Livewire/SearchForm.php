<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Ecommerce\Product;
use Illuminate\Support\Facades\App;
use Palindroma\Core\Http\Resources\ContentResource;
use Illuminate\Support\Facades\Cache;

class SearchForm extends Component
{
    public $keyword = null;
    public $products;

    public function mount(){
        if(!cache::get('products_' . App::getLocale())){
            Cache::put('products_' . App::getLocale(), ContentResource::collection(Product::all())->response()->getData()->data, 3000);
        }

        $this->products = Cache::get('products_' . App::getLocale(), []);
    }



    public function render()
    {
        if($this->keyword){
            $filteredProducts = collect($this->products)
            ->sortByDesc('published_at')
            ->when(!empty($this->keyword), function ($collection) {
                return $collection->filter(function ($value) {
                    return str_contains(strtolower($value['name']), strtolower($this->keyword));
                });
            })
            ->all();
        } else {
            $filteredProducts = [];
        }


        return view('livewire.search-form', ['filteredProducts' => $filteredProducts]);
    }
}
