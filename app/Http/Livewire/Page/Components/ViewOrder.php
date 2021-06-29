<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Order;
use Livewire\Component;

class ViewOrder extends Component
{
    public $order,$promo,$initial,$discount,$promoFlag;
    public $total;
    public function mount(Order $order)
    {
        $this->order = $order;
    }
    public function render()
    {
        $this->promoFlag = ($this->order->promocode !== null);
        foreach($this->order->products as $product)
        {
            $this->initial+=$product->price*$product->pivot->quantity;
            $this->discount+=$product->discount*$product->pivot->quantity;
            $this->total=$this->initial-$this->discount;
        }
        if($this->promoFlag)
        {
            if($this->order->promocode->type == 'flat')
            {
                $this->promo = $this->order->promocode->discount;
            }
            elseif($this->order->promocode->type == 'percentage')
            {
                $this->promo = round(($this->total*$this->order->promocode->discount/100),2);
            }
        }
        $this->total-=$this->promo;
        return view('livewire.page.components.view-order');
    }
}
