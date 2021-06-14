<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $title,$editable;
    public function mount()
    {
        $this->title = "Products";
    }
    public function render()
    {
        $products = Product::with('category','brand')->get();
        return view('livewire.admin.dashboard.products',compact('products'));
    }
}
