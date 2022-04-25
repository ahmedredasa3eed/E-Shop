<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class SearchResultComponent extends Component
{

    public $categoryId;
    public $searchText;

    public function mount($categoryId,$searchText){
        $this->categoryId = trim($categoryId);
        $this->searchText = trim($searchText);
    }


    public function addToCart($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');

        return redirect()->route('frontend.cart');
    }
    public function render()
    {
        if($this->categoryId == 0){
            $products = Product::where('name','LIKE','%'.$this->searchText.'%')
                ->orWhere('slug','LIKE','%'.$this->searchText.'%')->paginate();
        }
        else{
            $products = Product::where('category_id',$this->categoryId)
                ->where('name','LIKE','%'.$this->searchText.'%')
                ->orWhere('slug','LIKE','%'.$this->searchText.'%')->paginate();
        }

        $categories = Category::all();
        if($this->categoryId == 0){
            $categoryName = 'All Categoires';
        }
        else{
            $categoryName = Category::find($this->categoryId)->name;
        }
        return view('livewire.search-result-component',['products'=>$products,'categories'=>$categories,'categoryName'=>$categoryName]);
    }
}
