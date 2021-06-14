<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Product;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartItem extends Component
{
    public $qty,$cartId,$product,$item;
    public $listeners = ['updateQuantity'=>'getQuantity'];
    public function getQuantity($qty)
    {
        $this->qty = $qty;
        Cart::instance('cart')->update($this->cartId,$qty);
    }
    public function mount($cartId)
    {
        $this->cartId = $cartId;
    }
    public function removeFromCart()
    {
        $this->emit('removeFromCart',$this->cartId);
        $this->emitSelf('mount');
        $this->emitSelf('render');
    }
    public function render()
    {
        $item = Cart::instance('cart')->get($this->cartId);
        $this->product = Product::find($item->id);
        $this->qty = $item->qty;
        return view('livewire.page.components.cart-item',compact('item'));
    }
}
