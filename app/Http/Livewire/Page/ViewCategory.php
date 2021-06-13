<?php

namespace App\Http\Livewire\Page;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCategory extends Component
{
    use WithPagination;
    public $slug,$category;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $this->category = Category::with('products.brand')->where('slug',$this->slug)->first();
        $products = $this->category->products()->paginate(12);
        return view('livewire.page.view-category',compact('products'));
    }
}
