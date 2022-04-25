<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class NewCategoryComponent extends Component
{

    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required|unique:categories|min:4',
        'slug' => 'required|unique:categories',
    ];

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function resetInput(){
        $this->name ='';
        $this->slug ='';
    }
    public function store(){

        $this->validate();
        Category::create([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);
        $this->resetInput();
        session()->flash('success','Category Added successfully');
    }

    public function render()
    {
        return view('livewire.admin.new-category-component')->layout('layouts.admin_base');
    }
}
