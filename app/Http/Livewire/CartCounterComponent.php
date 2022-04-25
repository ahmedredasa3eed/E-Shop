<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounterComponent extends Component
{
    //make event and listner to update live wire (cart or wishlist counter) component
    protected $listeners = ['refresh' => '$refresh'];


    public function render()
    {
        return view('livewire.cart-counter-component');
    }
}
