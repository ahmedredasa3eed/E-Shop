<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class CategoryComponent extends Component
{
    use withPagination;

    public $sortType;
    public $pageSize;
    public $category_slug;

    public function mount($category_slug){
        $this->sortType = 'default';
        $this->pageSize = 12;
        $this->category_slug = $category_slug;
    }
    public function addToCart($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');

        return redirect()->route('frontend.cart');
    }
    public function render()
    {
        $category = Category::where('slug',$this->category_slug)->first();
        $categoryName = $category->name;


        if($this->sortType == 'latest'){
            $products = Product::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else if($this->sortType == 'price_asc'){
            $products = Product::where('category_id',$category->id)->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        else if($this->sortType == 'price_desc'){
            $products = Product::where('category_id',$category->id)->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::where('category_id',$category->id)->paginate($this->pageSize);
        }

        $categories = Category::all();

        return view('livewire.category',['products'=>$products,'categories'=>$categories,'categoryName'=>$categoryName]);
    }
}
