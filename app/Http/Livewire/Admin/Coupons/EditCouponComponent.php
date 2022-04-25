<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;
use function view;

class EditCouponComponent extends Component
{

    public $code,$value,$type,$cart_value,$expiry_date,$coupon_id;

    protected $rules = [
        //'code' => 'required|unique:coupons',
        'value' => 'required|numeric',
        'type' => 'required',
        'cart_value' => 'required|numeric',
        'expiry_date' => 'required|date',
    ];

    public function mount($coupon_id){
        $this->coupon_id = $coupon_id;
        $coupon = Coupon::findOrFail($this->coupon_id);

        $this->code = $coupon->code;
        $this->value = $coupon->value;
        $this->type = $coupon->type;
        $this->cart_value = $coupon->cart_value;
        $this->expiry_date = $coupon->expiry_date;
    }
    public function updateCoupon(){

        $this->validate();
        $coupon = Coupon::findOrFail($this->coupon_id);
        //$coupon->code = $this->code;
        $coupon->value = $this->value;
        $coupon->type = $this->type;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('success','Coupon Updated successfully');
    }
    public function render()
    {
        return view('livewire.admin.coupons.edit-coupon-component')->layout('layouts.admin_base');
    }
}
