<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Order;
use App\Models\PromoCode;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartAmoutDetails extends Component
{
    public $listeners = ['updateCheckout'=>'render'];
    public $initial,$discount,$total,$cart;
    public $promoCode,$promo,$promoFlag;
    public function usePromoCode()
    {
        $this->validate([
            'promoCode' => 'required|exists:promo_codes,code'
        ]);
        $promo = PromoCode::where('code',$this->promoCode)->first();
        if($promo->status)
        {
            if($promo->users->contains(auth()->user())){
                $this->addError('promoCode','You already used this promocode.');
            }
            elseif($promo->minimum >= $this->initial){
                $this->addError('promoCode','Sub Total amount must be greater than '.$promo->minimum.' to use this code.');
            }
            elseif($promo->start_at>now())
            {
                $this->addError('promoCode','This code is not yet usable.');
            }
            elseif($promo->end_at<now())
            {
                $this->addError('promoCode','This code is already expired.');
            }
            else
            {
                $this->cart->promocode()->associate($promo);
                $this->cart->save();
                $promo->users()->attach(auth()->id());
                $this->reset('promoCode');
            }
        }
        else
        {
            $this->addError('promoCode','This code is not active.');
        }
    }
    public function removePromoCode()
    {
        DB::table('promocode_user')->where([
            'user_id' => auth()->id(),
            'promocode_id' => $this->cart->promocode->id
        ])->delete();
        $this->cart->promocode()->dissociate($this->cart->promocode);
        $this->cart->save();
    }
    public function render()
    {
        $this->cart = Order::with('products','promocode')->where('session_id',session()->get('cart_id'))->get()->last();
        $this->initial = 0;
        $this->discount = 0;
        $this->total = 0;
        $this->promo = 0;
        if(!$this->cart) {
            redirect()->route('landing_page');
        }
        else
        {
            $this->promoFlag = ($this->cart->promocode !== null);
            foreach($this->cart->products as $product)
            {
                $this->initial+=$product->price*$product->pivot->quantity;
                $this->discount+=$product->discount*$product->pivot->quantity;
                $this->total=$this->initial-$this->discount;
            }
            if($this->promoFlag)
            {
                if($this->cart->promocode->type == 'flat')
                {
                    $this->promo = $this->cart->promocode->discount;
                }
                elseif($this->cart->promocode->type == 'percentage')
                {
                    $this->promo = round(($this->total*$this->cart->promocode->discount/100),2);
                }
            }
            $this->total-=$this->promo;
        }
        return view('livewire.page.components.cart-amout-details');
    }
}
