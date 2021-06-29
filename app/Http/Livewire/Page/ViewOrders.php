<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class ViewOrders extends Component
{
    public $orders;
    public function render()
    {
        $this->orders = auth()->user()->orders()->orderBy('id','DESC')->where('status','!=','cart')->get();
        return view('livewire.page.view-orders');
    }
}
