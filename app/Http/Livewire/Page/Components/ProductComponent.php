<?php

namespace App\Http\Livewire\Page\Components;

use Livewire\Component;

class ProductComponent extends Component
{
    public $i;
    public function mount($i)
    {
        $this->i = $i;
    }
    public function render()
    {
        return view('livewire.page.components.product-component');
    }
}
