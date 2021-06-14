<?php

namespace App\Http\Livewire\Page;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ViewItem extends Component
{
    public $slug,$product,$itemId,$qty,$inCart;
    public $listeners = ['updateQuantity'=>'getQuantity'];
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->product = Product::with('category','brand')->where('slug',$this->slug)->first();
        $this->qty = 1;
    }
    public function getQuantity($qty)
    {
        $this->qty = $qty;
    }
    public function addToCart()
    {
        $product = $this->product;
        Cart::instance('cart')->add(
            $product->id,
            $product->title,
            $this->qty,
            $product->price
        );
        $this->emit('updateCart');
    }
    public function removeFromCart()
    {
        $rowId = Cart::instance('cart')->content()->where('id',$this->product->id)->first()->rowId;
        Cart::instance('cart')->remove($rowId);
        $this->qty = 1;
        $this->emit('updateCart');
    }
    public function render()
    {
        $this->inCart = Cart::instance('cart')->content()->where('id',$this->product->id)->count();
        if(!$this->product)
        redirect()->route('landing_page');
        return view('livewire.page.view-item');
    }
}
