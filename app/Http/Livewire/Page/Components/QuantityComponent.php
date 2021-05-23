<?php

namespace App\Http\Livewire\Page\Components;

use Livewire\Component;

class QuantityComponent extends Component
{
    public $qty;
    public function mount()
    {
        $this->qty = 1;
    }
    public function increment()
    {
        $this->qty++;
    }
    public function decrement()
    {
        $this->qty--;
    }
    public function render()
    {
        return view('livewire.page.components.quantity-component');
    }
}
