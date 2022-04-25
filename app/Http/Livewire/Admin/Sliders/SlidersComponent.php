<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class SlidersComponent extends Component
{
    use withPagination;

    public function delete($slider_id){
        $slider = Slider::findOrFail($slider_id);
        $slider->delete();
        session()->flash('success','Slider Deleted successfully');
    }

    public function render()
    {
        $sliders = Slider::paginate();
        return view('livewire.admin.sliders.sliders-component',['sliders'=>$sliders])->layout('layouts.admin_base');
    }
}
