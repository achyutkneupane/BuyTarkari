<?php

namespace App\Http\Livewire\Page\Components;

use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['updateCart'=>'render'];
    public $cart;
    public function render()
    {
        $this->cart = FacadesCart::instance('cart')->content()->count();
        return view('livewire.page.components.cart');
    }
}
