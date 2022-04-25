<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class EditCategoryComponent extends Component
{

    public $name;
    public $slug;
    public $category_id;

    protected $rules = [
        'name' => 'required|unique:categories|min:4',
        'slug' => 'required|unique:categories',
    ];

    public function mount($category_id){
        $this->category_id = $category_id;
        $category = Category::where('id',$this->category_id)->first();
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function update(){
        $this->validate();
        $category = Category::where('id',$this->category_id)->first();
        $category->update([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);
        session()->flash('success','Category Updated Successfully');
    }
    public function render()
    {
        return view('livewire.admin.edit-category-component')->layout('layouts.admin_base');
    }
}
