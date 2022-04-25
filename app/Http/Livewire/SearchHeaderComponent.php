<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class SearchHeaderComponent extends Component
{

    public $categoryId = 0;
    public $searchText = ' ';

    public function search(){
        return redirect()->route('frontend.searchResult',['categoryId'=>$this->categoryId,'searchText'=>$this->searchText]);
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.search-header-component',['categories'=>$categories]);
    }
}
