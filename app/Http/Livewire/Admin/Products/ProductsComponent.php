<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsComponent extends Component
{
    use withPagination;

    protected $paginationTheme = 'bootstrap';


    public function delete($product_id){
        $product = Product::findOrFail($product_id);
        $product->delete();
        session()->flash('success','Product Deleted Successfully');
    }
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.products.products-component',['products'=> $products])->layout('layouts.admin_base');
    }
}
