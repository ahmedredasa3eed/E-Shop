<?php

namespace App\Http\Livewire\Admin\General;

use App\Models\SaleTimer;
use Livewire\Component;

class SaleTimerComponent extends Component
{
    public $saleDateTime;
    public $status;

    protected $rules = [
        'saleDateTime' => 'required',
        'status' => 'required',
    ];

    public function mount()
    {
        $saleTimer = SaleTimer::find(1);
        $this->saleDateTime = $saleTimer->sale_time;
        $this->status = $saleTimer->status;
    }

    public function updateSaleTimer()
    {
        $saleTimer = SaleTimer::find(1);
        $saleTimer->update([
            'sale_time' => $this->saleDateTime,
            'status' => $this->status
        ]);
        session()->flash('success', 'Sale Timer changed Successfully');
    }

    public function render()
    {
        return view('livewire.admin.general.sale-timer-component')->layout('layouts.admin_base');
    }
}
