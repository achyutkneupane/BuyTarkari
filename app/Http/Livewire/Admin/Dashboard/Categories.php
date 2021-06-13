<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $title,$addCatForm,$categoryTitle,$categorySlug,$editable;

    public $rules = [
        'categoryTitle' => 'required|unique:categories,title',
    ];
    public function mount()
    {
        $this->addCatForm = false;
        $this->title = "Categories";
    }
    public function showAddCatForm()
    {
        $this->addCatForm = true;
    }
    public function addCat()
    {
        $this->validate();
        if(Category::all()->count() > 0)
        $priority = Category::orderBy('priority','DESC')->first()->priority+1;
        else
        $priority = 1;
        Category::create([
            'title' => $this->categoryTitle,
            'slug' => Str::slug($this->categoryTitle),
            'priority' => $priority,
        ]);
        $this->reset(['categoryTitle','addCatForm']);
    }
    public function updateCatsOrder($cats)
    {
        foreach($cats as $cat)
        {
            Category::find($cat['value'])->update(['priority'=>$cat['order']]);
        }
    }
    public function toggleStatus($id,$status)
    {
        if($status == 'active')
            Category::find($id)->update(['status'=>'inactive']);
        else
            Category::find($id)->update(['status'=>'active']);
    }
    public function editCat($id)
    {
        $category = Category::find($id);
        $this->categoryTitle = $category->title;
        $this->categorySlug = $category->slug;
        $this->editable = $id;
    }
    public function confirmEditCat($id)
    {
        Category::find($id)->update([
            'title'=>$this->categoryTitle,
            'slug'=>$this->categorySlug,
        ]);
        $this->editable = NULL;
    }
    public function removeCat($id)
    {
        Category::find($id)->delete();
    }
    public function render()
    {
        $categories = Category::with('products')->orderBy('priority','ASC')->get();
        return view('livewire.admin.dashboard.categories', compact('categories'));
    }
}
