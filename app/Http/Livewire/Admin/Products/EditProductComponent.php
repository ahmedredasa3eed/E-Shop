<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductComponent extends Component
{
    use withFileUploads;
    public $product_id,$name,$slug,$short_description,$description,$regular_price,$sale_price,$SKU;
    public $stock_status,$featured,$quantity,$category_id;
    public $image;
    public $new_image;
    public $imageName;

    protected $rules=[
        'name' => 'required',
        'slug' => 'required|unique:products',
        'regular_price' =>'required|numeric',
        'sale_price' =>'required|numeric',
        'description' =>'required',
        'short_description' =>'required',
        'quantity' =>'required|numeric',
        'new_image' => 'sometimes|nullable|image|mimes:jpeg,jpg,png,gif|max:100000',
    ];

    public function mount($product_id){
        $this->product_id = $product_id;
        $product = Product::findOrFail($this->product_id);

        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->category_id = $product->category_id;
        $this->image = $product->image;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function updateProduct(){
        $this->validate();

       if($this->new_image){
           $this->imageName = Carbon::now()->timestamp. '.' .$this->new_image->extension();
           $this->new_image->storeAs('products', $this->imageName);
       }
       else{
           $this->imageName = $this->image;
       }

        $product = Product::where('id',$this->product_id)->first();
        $product->update([
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
            'image' => $this->imageName,
        ]);

        session()->flash('success','Product updated Successfully');

    }


    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.admin.products.edit-product-component',['categories'=>$categories])->layout('layouts.admin_base');
    }
}
