<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Category;
use Livewire\Component;

class CategoryNav extends Component
{
    public function render()
    {
        $categories = Category::orderBy('priority','ASC')->get('title');
        return view('livewire.page.components.category-nav',compact('categories'));
    }
}
