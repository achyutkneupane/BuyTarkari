<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Category;
use Livewire\Component;

class FourItems extends Component
{
    public $category,$fourProducts,$order;
    public function mount(Category $category,$order)
    {
        $this->category = $category;
        $this->order = $order;
        $this->fourProducts = $this->category->products()->with('brand','ratings')->orderBy('created_at','DESC')->orderBy('id','DESC')->take(4)->get();
    }
    public function render()
    {
        return view('livewire.page.components.four-items');
    }
}
