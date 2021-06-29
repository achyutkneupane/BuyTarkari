<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Order;
use App\Models\Product;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartItem extends Component
{
    public $qty,$cartId,$product;
    public $listeners = ['updateQuantity'=>'getQuantity'];
    public function getQuantity($qty)
    {
        $this->qty = $qty;
        $this->emit('updateCheckout');
        DB::table('order_product')->where('product_id',$this->cartId)->update(array('quantity'=>$this->qty));
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
    }
    public function mount($cartId)
    {
        $this->cartId = $cartId;
    }
    public function removeFromCart()
    {
        $this->emit('removeFromCart',$this->cartId);
    }
    public function render()
    {
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
        $this->product = $this->order->products()->find($this->cartId);
        $this->qty = $this->product->pivot->quantity;
        return view('livewire.page.components.cart-item');
    }
}
