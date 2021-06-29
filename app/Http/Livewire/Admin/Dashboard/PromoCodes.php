<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\PromoCode;
use Livewire\Component;

class PromoCodes extends Component
{
    public $title,$promocodes;
    public function mount()
    {
        $this->title = "Promocodes";
    }
    public function toggleStatus($id,$status)
    {
        if($status == true)
            PromoCode::find($id)->update(['status'=>false]);
        else
            PromoCode::find($id)->update(['status'=>true]);
    }
    public function removePromoCode($id)
    {
        PromoCode::find($id)->delete();
    }
    public function render()
    {
        $this->promocodes = PromoCode::all();
        return view('livewire.admin.dashboard.promo-codes');
    }
}
