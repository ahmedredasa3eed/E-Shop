<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProductComponent extends Component
{

    use withFileUploads;
    public $name,$slug,$short_description,$description,$regular_price,$sale_price,$SKU;
    public $stock_status,$featured,$quantity,$image,$category_id;

    protected $rules=[
        'name' => 'required',
        'slug' => 'required|unique:products',
        'regular_price' =>'required|numeric',
        'sale_price' =>'required|numeric',
        'description' =>'required',
        'short_description' =>'required',
        'quantity' =>'required|numeric',
        'image' =>'required|image|mimes:png,jpg,jpeg',
    ];

    public function mount(){
        $this->featured = 0;
        $this->stock_status = 'outOfStock';
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function saveProduct(){
        $this->validate();

        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAs('products', $imageName);

        Product::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
            'SKU' => $this->SKU,
            'stock_status' => $this->stock_status,
            'featured' => $this->featured,
            'quantity' => $this->quantity,
            'category_id' => $this->category_id,
            'image' => $imageName,
        ]);

        session()->flash('success','Product Created Successfully');

    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.products.create-product-component',['categories'=>$categories])->layout('layouts.admin_base');

    }
}
