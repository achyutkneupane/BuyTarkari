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
                                    <p class="card-text">
                                        <div class="container">
                                            <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                    <label for="productName">Product Name</label>
                                                    <input type="text" class="form-control" wire:model.lazy="productName" placeholder="Enter Product Name">
                                                    @error('productName')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label for="productCategory">Category</label>
                                                    <select class="form-control" wire:model.lazy="productCategory">
                                                        <option value="" disabled selected>Select a category</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('productCategory')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="productBrand">Brand</label>
                                                    <select class="form-control" wire:model.lazy="productBrand">
                                                        <option value="" disabled selected>Select a brand</option>
                                                        @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('productBrand')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-4">
                                                    <label for="productUnit">Unit</label>
                                                    <select class="form-control" wire:model.lazy.lazy="productUnit">
                                                        <option value="" disabled selected>Select an unit</option>
                                                        <option value="kg">KG</option>
                                                        <option value="l">Litre</option>
                                                        <option value="pcs">Pieces</option>
                                                    </select>
                                                    @error('productUnit')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="productPrice">Per Unit Price</label>
                                                    <input type="text" class="form-control" wire:model.lazy.lazy="productPrice" placeholder="Enter Per Unit Price">
                                                    @error('productPrice')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="productPrice">Discount</label>
                                                    <div class="flex-row d-flex">
                                                        <input type="text" wire:model.lazy="productDiscount" placeholder="Enter Discount" class="mr-2 form-control col-8">
                                                        <select class="form-control col-4" wire:model="discountType">
                                                            <option value="flat">Flat</option>
                                                            <option value="percentage">Percentage</option>
                                                        </select>
                                                    </div>
                                                    @error('productDiscount')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                    <label>Product Image</label>
                                                    <input type="file" class="form-control-file" wire:model.lazy='productImage'>
                                                    @error('productImage')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="centered form-row" wire:ignore>
                                                <div class="form-group col-lg-12 row-editor">
                                                    <label>Product Description</label>
                                                    <textarea id="productDescription" wire:model.defer="productDescription"></textarea>
                                                    @error('productDescription')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group">
                                                    <button class="btn btn-outline-primary" wire:click="addProduct">Store</button>
                                                </div>
                                            </div>
                                        </div>
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('#productDescription').summernote({
        placeholder: 'Enter Product Description',
        tabsize: 2,
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'video']],
        ],
        callbacks: {
            onChange: function(e) {
                    @this.set('productDescription', e);
            },
        }
    });
</script>
@endpush