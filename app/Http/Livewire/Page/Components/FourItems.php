<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class FourItems extends Component
{
    public $category,$fourProducts;
    public function mount(Category $category)
    {
        $this->category = $category;
        $this->fourProducts = $this->category->products()->with('brand')->orderBy('created_at','DESC')->orderBy('id','DESC')->take(4)->get();
    }
    public function render()
    {
        return view('livewire.page.components.four-items');
    }
}
