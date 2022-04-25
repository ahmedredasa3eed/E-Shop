<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSlidersComponent extends Component
{

    use withFileUploads;

    public $slider_id;
    public $title;
    public $sub_title;
    public $link;
    public $price;
    public $status;
    public $image;
    public $new_image;
    public $imageName;

    protected $rules = [
        'title' => 'required|min:3',
        'sub_title' => 'required|min:3',
        'link' => 'required|min:3',
        'price' => 'required|numeric',
        'new_image' => 'sometimes|nullable|image',
    ];

    public function mount($slider_id)
    {
        $this->slider_id = $slider_id;
        $slider = Slider::findOrFail($this->slider_id);

        $this->title = $slider->title;
        $this->sub_title = $slider->sub_title;
        $this->price = $slider->price;
        $this->image = $slider->image;
        $this->link = $slider->link;
        $this->status = $slider->status;
    }


    public function updateSlider()
    {
        $this->validate();

        if($this->new_image){
            $this->imageName = Carbon::now()->timestamp . '.' . $this->new_image->extension();
            $this->new_image->storeAs('sliders', $this->imageName);
        }else{
            $this->imageName = $this->image;
        }

        $slider = Slider::findOrFail($this->slider_id);
        $slider->update([
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'link' => $this->link,
            'price' => $this->price,
            'image' => $this->imageName,
            'status' => $this->status,
        ]);
        session()->flash('success', 'Slider Updated Successfully');
    }


    public function render()
    {
        return view('livewire.admin.sliders.edit-sliders-component')->layout('layouts.admin_base');;
    }
}

