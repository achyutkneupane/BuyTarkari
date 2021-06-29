<?php

namespace App\Http\Livewire\Page;

use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class ViewItem extends Component
{
    public $slug,$product,$itemId,$qty,$inCart,$rating,$inWL,$order;
    public $listeners = ['updateQuantity'=>'getQuantity'];
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->product = Product::with('category','brand')->where('slug',$this->slug)->first();
        $this->qty = 1;
        $this->rating = $this->product->ratings->avg('rating');
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
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
    public function removeFromCart()
    {
        DB::table('order_product')->where('order_id',$this->order->id)->where('product_id',$this->product->id)->delete();
        $this->qty = 1;
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
        $this->emit('updateCart');
    }
    public function addToWL()
    {
        $product = $this->product;
        Cart::instance('wishlist')->add(
            $product->id,
            $product->title,
            1,
            $product->price
        );
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
        if(!$this->product)
        redirect()->route('landing_page');
        return view('livewire.page.view-item');
    }
}
