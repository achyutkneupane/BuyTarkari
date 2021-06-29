<?php

namespace App\Http\Livewire\Page;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCategory extends Component
{
    use WithPagination;
    public $order;
    public $slug,$category,$sortProperty,$sortOrder,$brands;
    public $sortBy,$minPrice,$maxPrice,$brandSelected,$minRange,$maxRange;
    public $search = '';
    public $listeners = ['updateItemsWithBrand'=>'getBrands'];
    public function mount($slug)
    {
        $this->order = Order::with('products')->where('session_id',session('cart_id'))->get()->last();
        $this->sortBy = '';
        $this->slug = $slug;
        $this->category = Category::with('products.brand')->where('slug',$this->slug)->first();
        $this->sortProperty = 'id';
        $this->sortOrder = 'DESC';
        $this->minRange = $this->category->products->min('price');
        $this->maxRange = $this->category->products->max('price');
        $this->minPrice = $this->minRange;
        $this->maxPrice = $this->maxRange;
        $this->brands = collect();
        $this->category->products->map(
            function($product) {
                if(!$this->brands->contains($product->brand)){
                    $this->brands->push($product->brand);
                }
            }
        );
    }
    public function inCart($prodId)
    {
        return Cart::instance('cart')->content()->where('id',$prodId)->count();
    }
    public function updated($property)
    {
        if($property == 'sortBy')
        {
            if($this->sortBy == 'expensive')
            {
                $this->sortProperty = 'price';
                $this->sortOrder = 'DESC';
            }
            elseif($this->sortBy == 'cheap')
            {
                $this->sortProperty = 'price';
                $this->sortOrder = 'ASC';
            }
            elseif($this->sortBy == 'new')
            {
                $this->sortProperty = 'created_at';
                $this->sortOrder = 'DESC';
            }
            elseif($this->sortBy == 'rating')
            {
                $this->sortProperty = 'id';
                $this->sortOrder = 'DESC';
            }
        }
        elseif($property == 'minPrice')
        {
            if($this->minPrice >= $this->maxRange || $this->minPrice >= $this->maxPrice || $this->minPrice < $this->minRange)
            $this->minPrice = $this->minRange;
        }
        elseif($property == 'maxPrice')
        {
            if($this->maxPrice <= $this->minRange || $this->maxPrice <= $this->minPrice || $this->maxPrice > $this->maxRange)
            $this->maxPrice = $this->maxRange;
        }
    }
    public function getBrands($brands)
    {
        $this->brandSelected = $brands;
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $productColl = Product::with('ratings','brand')->where('status','active');
        if($this->sortBy == 'rating') {
            $productsColl = $productColl->leftJoin('ratings', 'ratings.product_id', '=', 'products.id')
                                ->select('products.*', DB::raw('AVG(rating) as ratings_average' ))
                                ->groupBy('id')
                                ->orderBy('ratings_average', 'DESC');
        }
        else {
            $productsColl = $productColl->orderBy($this->sortProperty,$this->sortOrder);
        }
        $products = $productsColl->where('category_id',$this->category->id)
                            ->where('title', 'like', '%'.$this->search.'%')
                            ->where('price','>=',$this->minPrice)
                            ->where('price','<=',$this->maxPrice)
                            ->where(function($product) {
                               if($this->brandSelected > 0)
                               {
                                   foreach($this->brandSelected as $index=>$brandId)
                                   {
                                       if($index == 0)
                                       {
                                           $product->where('brand_id',$brandId);
                                       }
                                       else {
                                           $product->orWhere('brand_id',$brandId);
                                       }
                                   }
                               }
                           })
                           ->paginate(12);
        return view('livewire.page.view-category',compact('products'));
    }
}