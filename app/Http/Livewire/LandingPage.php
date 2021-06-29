<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Order;
use Livewire\Component;

class LandingPage extends Component
{
    public $categories,$order;
    public function render()
    {
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
        $this->categories = Category::orderBy('priority','ASC')->where('status','active')->get();
        return view('livewire.page.landing-page');
    }
}
