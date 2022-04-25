<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesComponent extends Component
{
    use withPagination;

    public function delete($category_id){
        $category = Category::findOrFail($category_id);
        $category->delete();
        session()->flash('success','Category Deleted Successfully');
    }

    public function toggleFeatured($category_id){
        $category = Category::findOrFail($category_id);
        $featured_status = $category->is_featured == 1 ? 0 : 1;
        $category->update(['is_featured' => $featured_status]);
        session()->flash('success','Category Featured Status changed Successfully');

    }
    public function render()
    {
        $categories = Category::latest()->paginate();
        return view('livewire.admin.categories-component',['categories'=>$categories])->layout('layouts.admin_base');
    }
}
