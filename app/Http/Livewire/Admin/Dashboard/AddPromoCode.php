<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\PromoCode;
use Carbon\Carbon;
use Livewire\Component;

class AddPromoCode extends Component
{
    public $title;
    public $promoCode,$promoStatus,$promoAmount,$promoType,$promoMinimum,$promoStartAt,$promoEndAt;
    protected $rules = [
        'promoCode' => 'required|unique:promo_codes,code',
        'promoStatus' => 'required',
        'promoAmount' => 'required',
        'promoType' => 'required',
        'promoMinimum' => 'required',
        'promoStartAt' => 'required',
        'promoEndAt' => 'required',
    ];
    public function mount()
    {
        $this->title = "Add Promocode";
        $this->promoStatus = '';
        $this->promoType = '';
        $this->promoMinimum = '';
        $this->promoStartAt = now()->isoFormat('MM/DD/YYYY hh:mm A');
        $this->promoEndAt = now()->addYear()->isoFormat('MM/DD/YYYY hh:mm A');
    }
    public function addPromoCode()
    {
        $this->validate();
        PromoCode::create([
            'code' => $this->promoCode,
            'status' => $this->promoStatus,
            'discount' => $this->promoAmount,
            'type' => $this->promoType,
            'minimum' => $this->promoMinimum,
            'start_at' => Carbon::parse($this->promoStartAt),
            'end_at' => Carbon::parse($this->promoEndAt),
        ]);
        redirect()->route('adminPromocodes');
    }
    public function render()
    {
        return view('livewire.admin.dashboard.add-promo-code');
    }
}
