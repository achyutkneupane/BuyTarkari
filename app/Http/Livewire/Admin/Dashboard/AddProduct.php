<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;
    public $title,$brands,$categories;
    public $productName,$productCategory,$productBrand,$productUnit,$productPrice,$productDiscount,$discountType,$productImage,$productDescription;
    public function mount()
    {
        $this->title = "Add Product";
        $this->productCategory = '';
        $this->productBrand = '';
        $this->productUnit = '';
    }
    protected $rules = [
        'productDescription' => 'required',
        'productName' => 'required',
        'productCategory' => 'required',
        'productBrand' => 'required',
        'productUnit' => 'required',
        'productPrice' => 'required',
        'productImage' => 'required|image|max:5120',
    ];

    protected $messages = [
        'productImage.image' => 'Must be an image',
        'productImage.max' => 'Image must have size less than 5MB.'
    ];
    public function updated($property)
    {
        $this->validateOnly($property);
    }
    public function addProduct()
    {
        $this->validate();
        $extension = $this->productImage->extension();
        $path = $this->productImage->storeAs('products','a.'.$extension);
        Product::create([
            'title' => $this->productName,
            'description' => $this->productDescription,
            'unit' => $this->productUnit,
            'price' => $this->productPrice,
            'discount_amount' => $this->productDiscount,
            'discount_type' => $this->discountType,
            'category_id' => $this->productCategory,
            'brand_id' => $this->productBrand,
            'image_link' => $path
        ]);
    }
    public function render()
    {
        $this->brands = Brand::where('status','active')->get();
        $this->categories = Category::where('status','active')->get();
        return view('livewire.admin.dashboard.add-product');
    }
}
