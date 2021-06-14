<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;

class Brands extends Component
{
    public $title,$addBrandForm,$brandTitle,$brandSlug,$editable;

    public $rules = [
        'brandTitle' => 'required|unique:brands,title',
    ];
    public function mount()
    {
        $this->addBrandForm = false;
        $this->title = "Brands";
    }
    public function showAddBrandForm()
    {
        $this->addBrandForm = true;
    }
    public function addBrand()
    {
        $this->validate();
        if(Brand::all()->count() > 0)
        $priority = Brand::orderBy('priority','DESC')->first()->priority+1;
        else
        $priority = 1;
        Brand::create([
            'title' => $this->brandTitle,
            'slug' => Str::slug($this->brandTitle),
            'priority' => $priority,
        ]);
        $this->reset(['brandTitle','addBrandForm']);
    }
    public function updateBrandsOrder($brands)
    {
        foreach($brands as $brand)
        {
            Brand::find($brand['value'])->update(['priority'=>$brand['order']]);
        }
    }
    public function toggleStatus($id,$status)
    {
        if($status == 'active')
            Brand::find($id)->update(['status'=>'inactive']);
        else
            Brand::find($id)->update(['status'=>'active']);
    }
    public function editBrand($id)
    {
        $brand = Brand::find($id);
        $this->brandTitle = $brand->title;
        $this->brandSlug = $brand->slug;
        $this->editable = $id;
    }
    public function confirmEditBrand($id)
    {
        Brand::find($id)->update([
            'title'=>$this->brandTitle,
            'slug'=>$this->brandSlug,
        ]);
        $this->editable = NULL;
    }
    public function removeBrand($id)
    {
        Brand::find($id)->delete();
    }
    public function render()
    {
        $brands = Brand::with('products')->orderBy('priority','ASC')->get();
        return view('livewire.admin.dashboard.brands', compact('brands'));
    }
}
