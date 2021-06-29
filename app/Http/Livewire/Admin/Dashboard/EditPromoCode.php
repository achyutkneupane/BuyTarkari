<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\PromoCode;
use Carbon\Carbon;
use Livewire\Component;

class EditPromoCode extends Component
{
    public $title,$promoId,$promo;
    public $promoCode,$promoStatus,$promoAmount,$promoType,$promoMinimum,$promoStartAt,$promoEndAt;
    protected $rules = [
        'promoCode' => 'required',
        'promoStatus' => 'required',
        'promoAmount' => 'required',
        'promoType' => 'required',
        'promoMinimum' => 'required',
        'promoStartAt' => 'required',
        'promoEndAt' => 'required',
    ];
    public function mount($promoId)
    {
        $this->promoId = $promoId;
        $this->promo = PromoCode::find($this->promoId);
        $this->title = "Add Promocode";
        $this->promoCode = $this->promo->code;
        $this->promoStatus = $this->promo->status;
        $this->promoAmount = $this->promo->discount;
        $this->promoType = $this->promo->type;
        $this->promoMinimum = $this->promo->minimum;
        $this->promoStartAt = Carbon::parse($this->promo->start_at)->isoFormat('MM/DD/YYYY hh:mm A');
        $this->promoEndAt = Carbon::parse($this->promo->end_at)->isoFormat('MM/DD/YYYY hh:mm A');
    }
    public function editPromoCode()
    {
        $this->validate();
        $this->promo->update([
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
        return view('livewire.admin.dashboard.edit-promo-code');
    }
}
