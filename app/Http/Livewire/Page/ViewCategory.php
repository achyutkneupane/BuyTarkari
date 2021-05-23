<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class ViewCategory extends Component
{
    public $catId;
    public function mount($id)
    {
        $this->catId = $id;
    }
    public function render()
    {
        return view('livewire.page.view-category');
    }
}
