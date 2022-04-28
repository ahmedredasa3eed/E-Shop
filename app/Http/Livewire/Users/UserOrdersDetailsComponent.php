<?php

namespace App\Http\Livewire\Users;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrdersDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id){
        $this->order_id = $order_id;
    }
    public function render()
    {
        $order = Order::where('id',$this->order_id)->where('user_id',Auth::user()->id)->first();
        return view('livewire.users.user-orders-details-component',['order'=>$order]);
    }
}
