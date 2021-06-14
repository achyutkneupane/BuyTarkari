<?php

namespace App\Http\Livewire\Page\Components;

use Livewire\Component;

class QuantityComponent extends Component
{
    public $qty,$unit;
    public function mount($unit,$qty)
    {
        $this->unit = $unit;
        $this->qty = $qty;
    }
    public function increment()
    {
        $this->qty++;
        $this->emitUp('updateQuantity',$this->qty);
    }
    public function decrement()
    {
        $this->qty--;
        $this->emitUp('updateQuantity',$this->qty);
    }
    public function render()
    {
        return view('livewire.page.components.quantity-component');
    }
}
