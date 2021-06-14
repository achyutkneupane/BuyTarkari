<?php

namespace App\Http\Livewire\Page\Components;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class BrandList extends Component
{
    public $brandSelected,$brands,$brandCollection;
    public $brandSearch = '';
    public function mount($brands)
    {
        $this->brandCollection = $brands;
        $this->brandSelected = [];
        $this->brands = collect();
    }
    public function updatingBrandSearch($text)
    {
        $this->brandSearch = $text;
    }
    public function render()
    {
        if($this->brandSearch == "")
        {
            $this->brands = $this->brandCollection;
        }
        else
        {
            $this->br = new Collection();
            $this->brandCollection->map(
                function($brand) {
                    $flag = stripos($brand['title'],$this->brandSearch);
                    if($flag !== false)
                    {
                        $this->br->push($brand);
                    }
                }
            );
            $this->brands = $this->br;
        }
        $this->brands = json_decode($this->brands);
        return view('livewire.page.components.brand-list');
    }
}
