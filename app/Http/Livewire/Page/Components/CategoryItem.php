<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CategoryItem extends Component
{
    public $product,$inCart,$qty;
    public $listeners = ['updateQuantity'=>'getQuantity'];
    public function mount(Product $product)
    {
        $this->product = $product;
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
        return view('livewire.page.components.category-item');
    }
}
