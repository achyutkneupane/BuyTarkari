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
                                        <h5 class="card-title">All Products</h5>
                                        <a class="px-3 py-2 btn btn-success" href="{{ route('adminAddProduct') }}">+ Add</a>
                                    </div>
                                    <p class="card-text">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                              <tr class="text-center">
                                                <th scope="col">ID</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-right">Actions</th>
                                              </tr>
                                            </thead>
                                            <tbody class="user-select-none">
                                                @if($products->count() > 0)
                                                @foreach ($products as $product)
                                                <tr wire:key="product-{{ $product->id }}" role="button">
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        {{ $product->title }}
                                                    </td>
                                                    <td>
                                                        {{ $product->slug }}
                                                    </td>
                                                    <td>
                                                        {{ $product->brand->title }}
                                                    </td>
                                                    <td>
                                                        {{ $product->category->title }}
                                                    </td>
                                                    <td class="text-center" wire:click="toggleStatus({{ $product->id }},'{{ $product->status }}')">
                                                        <label class="switch">
                                                            <input type="checkbox"{{ $product->status == 'active' ? ' checked' : '' }}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td class="text-right">
                                                        <button class="mx-1 btn btn-warning" wire:click="editProduct({{ $product->id }})">Edit</button>
                                                        <button class="mx-1 btn btn-danger" wire:click="removeProduct({{ $product->id }})">Remove</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        No products till now. Click <b>+Add</b> to add new.
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