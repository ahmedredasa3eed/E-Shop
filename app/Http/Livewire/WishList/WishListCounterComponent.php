<?php

namespace App\Http\Livewire\WishList;

use Livewire\Component;

class WishListCounterComponent extends Component
{

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.wish-list.wish-list-counter-component');
    }
}
