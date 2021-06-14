<div>
    @section('title',$title)
    <div class="pt-4 content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center">
                            <div class="card col-lg-10">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">All Categories</h5>
                                        <button class="px-3 py-2 btn btn-success" wire:click="showAddCatForm">+ Add</button>
                                    </div>
                                    <p class="card-text">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                              <tr class="text-center">
                                                <th scope="col">ID</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">Product Count</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-right">Actions</th>
                                              </tr>
                                            </thead>
                                            <tbody wire:sortable="updateCatsOrder" class="user-select-none">
                                                @if($categories->count() > 0)
                                                @foreach ($categories as $category)
                                                <tr wire:sortable.handle wire:sortable.item="{{ $category->id }}" wire:key="category-{{ $category->id }}" role="button">
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        @if($category->id == $this->editable)
                                                        <input type="text" wire:model="categoryTitle" class="form-control user-select-auto">
                                                        @else
                                                        {{ $category->title }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($category->id == $this->editable)
                                                        <input type="text" wire:model="categorySlug" class="form-control user-select-auto">
                                                        @else
                                                        {{ $category->slug }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $category->products->count() }}
                                                    </td>
                                                    <td class="text-center" wire:click="toggleStatus({{ $category->id }},'{{ $category->status }}')">
                                                        <label class="switch">
                                                            <input type="checkbox"{{ $category->status == 'active' ? ' checked' : '' }}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td class="text-right">
                                                        @if($category->id == $this->editable)
                                                        <button class="mx-1 btn btn-success" wire:click="confirmEditCat({{ $category->id }})">Save</button>
                                                        @else
                                                        <button class="mx-1 btn btn-warning" wire:click="editCat({{ $category->id }})">Edit</button>
                                                        @endif
                                                        <button class="mx-1 btn btn-danger" wire:click="removeCat({{ $category->id }})">Remove</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                    @if(!$addCatForm)
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            No Categories till now. Click <b>+Add</b> to add new.
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endif
                                                @if($addCatForm)
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="d-flex">
                                                            <input type="text" placeholder="Enter Category Title" wire:model.lazy='categoryTitle' class="form-control" autofocus>
                                                            <button class="px-5 ml-5 btn btn-success" wire:click="addCat">Add</button>
                                                        </div>
                                                        @error('categoryTitle')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
<style>
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: red;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: green;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px green;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush