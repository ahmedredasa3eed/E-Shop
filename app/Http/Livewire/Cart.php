<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as Carts;
class Cart extends Component
{

    public $isVisibleCouponArea;
    public $coupon_code;

    public $discount,$taxAfterDiscount,$subTotalAfterDiscount,$totalAfterDiscount;

    public function mount(){
        $this->isVisibleCouponArea = 1;
    }

    public function increaseQty($rowId){
        $product = Carts::instance('cart')->get($rowId);
        $newQty = $product->qty + 1;
        Carts::instance('cart')->update($rowId, $newQty);// Will update the quantity
    }

    public function decreaseQty($rowId){
        $product = Carts::instance('cart')->get($rowId);
        $newQty = $product->qty - 1;
        Carts::instance('cart')->update($rowId, $newQty);// Will update the quantity
        $this->emitTo('cart-counter-component','refresh');

    }

    public function remove($rowId){
        Carts::instance('cart')->remove($rowId);
        $this->emitTo('cart-counter-component','refresh');

    }

    public function destroyCart(){
        Carts::instance('cart')->destroy();
        $this->emitTo('cart-counter-component','refresh');
    }

    public function applyCouponCode(){
        $coupon = Coupon::where('code','=',$this->coupon_code)->where('cart_value','<=',Carts::instance('cart')->subtotal())->where('expiry_date','>=',Carbon::today())->first();
        if(!$coupon){
            session()->flash('coupon_error','Coupon is invalid Or Expired');
        }else{
            session()->put('coupon',[
                'code' => $coupon->code,
                'value' => $coupon->value,
                'cart_value' => $coupon->cart_value,
                'type' => $coupon->type,
                'expiry_date' => $coupon->expiry_date,
            ]);
        }
    }

    public function calculateDiscount(){
        if(session()->has('coupon')['type'] == 'fixed'){
            $this->discount = session()->get('coupon')['value'];
        }else{
            $this->discount = (Carts::instance('cart')->subtotal() * session()->get('coupon')['value']) /100;
        }
        $this->subTotalAfterDiscount = Carts::instance('cart')->subtotal() - $this->discount;
        $this->taxAfterDiscount = ($this->subTotalAfterDiscount * config('cart.tax')) / 100;
        $this->totalAfterDiscount = $this->subTotalAfterDiscount + $this->taxAfterDiscount;
    }

    public function forgetCoupon(){
        if(session()->has('coupon')){
            session()->forget('coupon');
        }
    }

    public function render()
    {
        //check that subtotal is greater than cart value;
        if(session()->has('coupon')){
            if(Carts::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }else{
                $this->calculateDiscount();
            }
        }
        return view('livewire.cart');
    }
}
