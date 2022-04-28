<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;

class OrdersItemsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order = Order::with('user','orderItems','transaction')->findOrFail($this->order_id);
        //dd($orders);
        return view('livewire.admin.orders.orders-items-component',['order'=>$order])->layout('layouts.admin_base');
    }
}
