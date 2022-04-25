<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;
use function view;

class CreateCouponComponent extends Component
{

    public $code,$value,$type,$cart_value,$expiry_date;

    protected $rules = [
        'code' => 'required|unique:coupons',
        'value' => 'required|numeric',
        'type' => 'required',
        'cart_value' => 'required|numeric',
        'expiry_date' => 'required|date',
    ];

    public function mount(){
        $this->type = 'fixed';
    }
    public function saveCoupon(){

        $this->validate();
        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->value = $this->value;
        $coupon->type = $this->type;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('success','Coupon Created successfully');
    }

    public function render()
    {
        return view('livewire.admin.coupons.create-coupon-component')->layout('layouts.admin_base');
    }
}
