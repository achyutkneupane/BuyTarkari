<?php

namespace App\Http\Livewire\Page;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ViewCart extends Component
{
    public $cart;
    public $listeners = ['removeFromCart'];
    public function removeFromCart($id)
    {
        Cart::instance('cart')->remove($id);
        $this->emit('updateCart');
        $this->emitSelf('render');
    }
    public function render()
    {
        $this->cart = Cart::instance('cart')->content();
        return view('livewire.page.view-cart');
    }
}
