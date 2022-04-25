<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
class Shop extends Component
{
    use withPagination;

    //protected $paginationTheme = 'bootstrap';

    public $sortType;
    public $pageSize;

    public $min_price;
    public $max_price;

    public function mount(){
        $this->sortType = 'default';
        $this->pageSize = 12;

        $this->min_price=1;
        $this->max_price=1000;
    }
    public function addToCart($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        //auto refresh cart counter
        $this->emitTo('cart-counter-component','refresh');
        //return redirect()->route('frontend.cart');
    }

    public function addToWishList($product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        //auto refresh wishlist counter
        $this->emitTo('wish-list.wish-list-counter-component','refresh');
    }

    public function removeFromWishList($product_id){
        foreach (Cart::instance('wishlist')->content() as $item) {
            //dd($item);
            if($item->id == $product_id){
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('wish-list.wish-list-counter-component','refresh');
            }
        }
    }
    public function render()
    {
        if($this->sortType == 'latest'){
            $products = Product::with('category')->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else if($this->sortType == 'price_asc'){
            $products = Product::with('category')->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        else if($this->sortType == 'price_desc'){
            $products = Product::with('category')->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::with('category')->whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pageSize);
        }

        $categories = Category::all();

        $wishlist = Cart::instance('wishlist')->content()->pluck('id');
        //dd($wishlist);
        return view('livewire.shop',['products'=>$products,'categories'=>$categories,'wishlist'=>$wishlist]);
    }
}
