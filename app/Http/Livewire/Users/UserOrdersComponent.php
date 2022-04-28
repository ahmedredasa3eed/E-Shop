<?php

namespace App\Http\Livewire\Users;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrdersComponent extends Component
{

    public function cancelOrder($order_id){
        $order = Order::findOrFail($order_id);
        $order->status = 'canceled';
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
    }
    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->get();

        return view('livewire.users.user-orders-component',['orders'=>$orders]);
    }
}
