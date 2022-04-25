<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductDetails extends Component
{
    public $slug;

    public $qty;

    public function mount($slug){
        $this->slug = $slug;
        $this->qty=1;
    }

    public function increaseQty(){
        $this->qty ++;
    }

    public function decreaseQty(){
        if(!$this->qty > 1){
            $this->qty --;
        }
    }
    public function addToCart($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');

        return redirect()->route('frontend.cart');
    }

    public function render()
    {
        $product = Product::with('category')->where('slug',$this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id',$product->category_id)->limit(6)->get();
        return view('livewire.product-details',[
            'product'=>$product,
            'popular_products'=>$popular_products,
            'related_products'=>$related_products
        ]);
    }
}
