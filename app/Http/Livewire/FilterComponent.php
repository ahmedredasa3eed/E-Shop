<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class FilterComponent extends Component
{

    public $sortType;
    public $pageSize;

    public function mount(){
        $this->sortType = 'default';
        $this->pageSize = 12;
    }


    public function render()
    {
        if($this->sortType == 'latest'){
            $products = Product::with('category')->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else if($this->sortType == 'price_asc'){
            $products = Product::with('category')->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        else if($this->sortType == 'price_desc'){
            $products = Product::with('category')->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::with('category')->paginate($this->pageSize);
        }

        $categories = Category::all();

        return view('livewire.filter-component',['products'=>$products,'categories'=>$categories]);
    }
}
