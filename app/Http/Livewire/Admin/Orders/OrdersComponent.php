<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrdersComponent extends Component
{

    public function updateOrderStatus($order_id,$status){
        $order = Order::findOrFail($order_id);
        if($status == 'confirmed'){
            $order->update([
                'status'=>'confirmed',
                'confirmed_date'=>DB::raw('CURRENT_DATE'),
            ]);
        }
        else if ($status == 'delivered'){
            $order->update([
                'status'=>'delivered',
                'delivered_date'=>DB::raw('CURRENT_DATE'),
            ]);
        }else{
            $order->update([
                'status'=>'canceled',
                'canceled_date'=>DB::raw('CURRENT_DATE'),
            ]);
        }
    }
    public function render()
    {
        $orders = Order::all();
        return view('livewire.admin.orders.orders-component',['orders'=>$orders])->layout('layouts.admin_base');
    }
}
