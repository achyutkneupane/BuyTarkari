<?php

namespace App\Http\Livewire\Page;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewCart extends Component
{
    public $cart,$order,$cartCount;
    public $listeners = ['removeFromCart'];
    public function removeFromCart($id)
    {
        $prodId = $id;
        DB::table('order_product')->where('order_id',$this->order->id)->where('product_id',$prodId)->delete();
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
        $this->emit('updateCart');
        $this->emit('updateCheckout');
        $this->emitSelf('render');
    }
    public function render()
    {
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
        $this->cart = ($this->order) ? $this->order->products : null;
        $this->cartCount = ($this->order) ? $this->order->products->count() : 0;
        return view('livewire.page.view-cart');
    }
}
