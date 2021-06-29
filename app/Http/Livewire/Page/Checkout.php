<?php

namespace App\Http\Livewire\Page;

use App\Models\Address;
use App\Models\Order;
use App\Models\Paymentmethod;
use App\Models\PromoCode;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Checkout extends Component
{
    public $initial,$discount,$total,$cart,$payments,$addresses;
    public $promo,$promoFlag,$payment,$shipping_address,$billing_address;
    public $addAddressFlag;
    public $first_name,$last_name,$company,$number,$street_01,$street_02,$city,$province;
    public function mount()
    {
        $this->addAddressFlag = false;
        $this->shipping_address = '';
        $this->billing_address = '';
    }
    public function toggleAddAddressFlag()
    {
        if($this->addAddressFlag) {
            $this->addAddressFlag = false;
        }
        else
        {
            $this->reset('first_name','last_name','company','number','street_01','street_02','city','province');
            $this->addAddressFlag = true;
        }
    }
    public function addAddress()
    {
        $values = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => '',
            'number' => 'required,numeric,digits:10',
            'street_01' => 'required',
            'street_02' => '',
            'city' => 'required',
            'province' => 'required',
        ],[],[
            'street_01' => 'street address'
        ]);
        auth()->user()->addresses()->create($values);
        $this->toggleAddAddressFlag();
    }
    public function checkout()
    {
        $values = $this->validate([
            'payment' => 'required',
            'shipping_address' => 'required',
            'billing_address' => 'required'
        ]);
        $this->cart->paymentmethod()->associate($this->payment);
        $this->cart->status = 'unpaid';
        $this->cart->shipping_address = $this->shipping_address;
        $this->cart->billing_address = $this->billing_address;
        $this->cart->save();
        session()->forget('cart_id');
        redirect()->route('viewOrders');
    }
    public function render()
    {
        $this->payments = Paymentmethod::orderBy('id','ASC')->where('status',true)->get();
        $this->cart = Order::with('products','promocode')->where('session_id',session()->get('cart_id'))->get()->last();
        $this->initial = 0;
        $this->discount = 0;
        $this->total = 0;
        $this->promo = 0;
        $this->addresses = auth()->user()->addresses;
        if(!$this->cart && $this->cart->products->count()) {
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
        return view('livewire.page.checkout');
    }
}
