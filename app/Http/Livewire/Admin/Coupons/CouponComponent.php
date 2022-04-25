<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;
use function view;

class CouponComponent extends Component
{
    public function delete($coupon_id){

        $coupon = Coupon::findOrFail($coupon_id);
        $coupon->delete();
        session()->flash('success','Coupon Deleted Successfully');
    }
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.coupons.coupon-component',['coupons'=>$coupons])->layout('layouts.admin_base');
    }
}
