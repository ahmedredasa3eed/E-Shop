<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';
    protected $guarded = [];

    public function sliderStatus(){
        return $this->status == 1 ? 'Active' : 'Inactive';
    }
}
