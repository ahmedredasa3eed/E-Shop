<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateSliderComponent extends Component
{
    use withFileUploads;

    public $title;
    public $sub_title;
    public $link;
    public $image;
    public $price;
    public $status;

    protected $rules = [
        'title' =>'required|min:3',
        'sub_title' =>'required|min:3',
        'link' =>'required|min:3',
        'price' =>'required|numeric',
        'image' =>'required|image',
    ];

    public function mount(){
        $this->status = 1;
    }

    public function resetInputs(){
        $this->title = '';
        $this->sub_title = '';
        $this->price = '';
        $this->link = '';
        $this->image = null;
    }
    public function saveSlider(){

        $this->validate();

        $imageName = Carbon::now()->timestamp . '.' .$this->image->extension();
        $this->image->storeAs('sliders',$imageName);

        Slider::create([
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'link' => $this->link,
            'price' => $this->price,
            'image' => $imageName,
            'status' => $this->status,
        ]);
        $this->resetInputs();
        session()->flash('success','Slider Created Successfully');
    }
    public function render()
    {
        return view('livewire.admin.sliders.create-slider-component')->layout('layouts.admin_base');;
    }
}
