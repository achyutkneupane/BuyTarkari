<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class ViewItem extends Component
{
    public $itemId;
    public function mount($id)
    {
        $this->itemId = $id;
    }
    public function render()
    {
        return view('livewire.page.view-item');
    }
}
