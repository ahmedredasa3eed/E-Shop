<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart as Carts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Checkout extends Component
{
    public $name,$email,$phone,$address,$city,$country;
    public $payment_type;
    public $order_done;


    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
        'phone' => 'required|numeric|min:10',
        'address' => 'required|min:10',
        'city' => 'required',
        'country' => 'required',
        'payment_type' => 'required',
    ];

    //for real time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(){
        if(!Carts::instance('cart')->content()->count() > 0 )
            return redirect()->route('frontend.cart');
    }

    public function placeOrder(){
        $this->validate();

        try {
            DB::commit();

            //Save order main data
            $newOrder = new Order();
            $newOrder->user_id = Auth::user()->id;
            $newOrder->subtotal = session()->get('checkout')['subTotal'];
            $newOrder->discount = session()->get('checkout')['discount'];
            $newOrder->tax = session()->get('checkout')['tax'];
            $newOrder->total = session()->get('checkout')['total'];
            $newOrder->name = $this->name;
            $newOrder->email = $this->email;
            $newOrder->phone = $this->phone;
            $newOrder->address = $this->address;
            $newOrder->city = $this->city;
            $newOrder->country = $this->country;
            $newOrder->status = 'ordered';
            $newOrder->save();

            //save order items data

            foreach (Cart::instance('cart')->content() as $item){
                $newOrderItem = new OrderItem();
                $newOrderItem->order_id = $newOrder->id;
                $newOrderItem->product_id = $item->id;
                $newOrderItem->price = $item->price;
                $newOrderItem->qty = $item->qty;
                $newOrderItem->save();
            }

            //save order transaction payment data
            if($this->payment_type == 'cod'){
                $transaction = new Transaction();
                $transaction->user_id = Auth::user()->id;
                $transaction->order_id = $newOrder->id;
                $transaction->payment_type = 'cod';
                $transaction->payment_status = 'pending';
                $transaction->save();
            }

            $this->order_done = 1;
            session()->forget('checkout');
            if(session()->has('coupon')){
                session()->forget('coupon');
            }

            //destroy cart
            Cart::instance('cart')->destroy();
            $this->emitTo('cart-counter-component','refresh');

        }catch (\Exception $ex){
            DB::rollBack();
            //dd($ex);
        }

    }

    public function verifyCheckout(){
        if(!Auth::check()){
            return redirect()->route('login');
        }
        else if($this->order_done ==1){
            return redirect()->route('frontend.thank_you');
        }
        else if (!session()->has('checkout')){
            return redirect()->route('frontend.cart');
        }
    }
    public function render()
    {
        $this->verifyCheckout();
        return view('livewire.checkout');
    }
}
