<?php

namespace App\Http\Livewire\WishList;

use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Facades\Cart as Carts;
use Livewire\Component;

class WishListComponent extends Component
{

    public function addToCart($product_id,$product_name,$product_price,$rowId){
        //dd('here');
        Carts::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->remove($rowId);
        return redirect()->route('frontend.cart');
    }

    public function remove($rowId){
        Carts::instance('wishlist')->remove($rowId);
        $this->emitTo('wish-list.wish-list-counter-component','refresh');

    }

    public function destroyWishList(){
        Carts::instance('wishlist')->destroy();
        $this->emitTo('wish-list.wish-list-counter-component','refresh');

    }

    public function render()
    {
        return view('livewire.wish-list.wish-list-component');
    }
}
