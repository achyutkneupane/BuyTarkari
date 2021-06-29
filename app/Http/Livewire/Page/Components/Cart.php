<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Order;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['updateCart'=>'render'];
    public $cart;
    public function render()
    {
        $this->cart = session()->get('cart_id') ? Order::where('session_id',session()->get('cart_id'))->first()->products->count() : null;
        return view('livewire.page.components.cart');
    }
}
