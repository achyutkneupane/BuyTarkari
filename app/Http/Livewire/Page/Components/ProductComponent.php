<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class ProductComponent extends Component
{
    public $product,$qty,$inCart,$rating,$inWL,$order;
    public $listeners = ['updateQuantity'=>'getQuantity'];
    public function mount($product,$order)
    {
        $this->order = $order;
        $this->product = $product;
        $this->qty = 1;
        if($product->average)
        $this->rating = $product->average;
        else
        $this->rating = $product->rating;
    }
    public function getQuantity($qty)
    {
        $this->qty = $qty;
    }
    public function addToCart()
    {
        if(session()->has('cart_id') === false) {
            $sessionId = Str::random(15);
            $order = Order::create([
                'session_id' => $sessionId,
                'user_id' => auth()->id()
            ]);
            session([
                'cart_id' => $sessionId
            ]);
        }
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
        DB::table('order_product')->insert([
            'order_id' => $this->order->id,
            'product_id' => $this->product->id,
            'quantity' => $this->qty,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
        $this->emit('updateCart');
    }
    public function addToWL()
    {
        $product = $this->product;
        DB::table('order_product')->insert([
            'order_id' => $this->order->id,
            'product_id' => $product->id,
            'quantity' => $this->qty,
        ]);
    }
    public function removeFromCart()
    {
        DB::table('order_product')->where('order_id',$this->order->id)->where('product_id',$this->product->id)->delete();
        $this->qty = 1;
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
        $this->emit('updateCart');
    }
    public function removeFromWL()
    {
        $rowId = Cart::instance('wishlist')->content()->where('id',$this->product->id)->first()->rowId;
        Cart::instance('wishlist')->remove($rowId);
    }
    public function render()
    {
        $this->inCart = $this->order ? $this->order->products->contains($this->product) : false;
        $this->inWL = Cart::instance('wishlist')->content()->where('id',$this->product->id)->count();
        return view('livewire.page.components.product-component');
    }
}
