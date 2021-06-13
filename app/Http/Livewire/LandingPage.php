<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class LandingPage extends Component
{
    public $categories;
    public function render()
    {
        $this->categories = Category::orderBy('priority','ASC')->where('status','active')->get();
        return view('livewire.page.landing-page');
    }
}
