<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\SaleTimer;
use App\Models\Slider;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $sliders = Slider::all();
        $latest_products = Product::orderBy('created_at','DESC')->take(8)->get();
        $home_categories = Category::with('products')->where('is_featured','=',1)->take(10)->get();
        $sale_products = Product::where('sale_price','>',0)->take(10)->get();
        $sale_timer = SaleTimer::find(1);
        return view('livewire.home',['sliders'=>$sliders,'latest_products'=>$latest_products,
            'home_categories'=>$home_categories,'sale_products'=>$sale_products,'sale_timer'=>$sale_timer]);
    }
}
