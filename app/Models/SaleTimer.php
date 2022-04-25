<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleTimer extends Model
{
    use HasFactory;
    protected $table = 'sale_timers';
    protected $guarded= [];
}
