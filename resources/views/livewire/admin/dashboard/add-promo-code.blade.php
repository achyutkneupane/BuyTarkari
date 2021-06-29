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
                                        <h5 class="card-title">Add Promocode</h5>
                                        <button class="px-3 py-2 btn btn-success" wire:click='addPromoCode'>Add</button>
                                    </div>
                                    <p class="card-text">
                                        <div class="container">
                                            <div class="form-row">
                                                <div class="form-group col-lg-4">
                                                    <label for="promoCode">Promo Code</label>
                                                    <input type="text" class="form-control" wire:model.debounce.1000ms="promoCode" placeholder="Enter Promo Code">
                                                    @error('promoCode')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="promoStatus">Status</label>
                                                    <select class='form-control' wire:model='promoStatus'>
                                                        <option value='' disabled selected>Select Status</option>
                                                        <option value='1'>Active</option>
                                                        <option value='0'>Inactive</option>
                                                    </select>
                                                    @error('promoStatus')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="promoCode">Discount</label>
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <input type="text" class="form-control" wire:model.debounce.1000ms="promoAmount" placeholder="Enter Discount">
                                                        </div>
                                                        <div class="col-5">
                                                            <select class='form-control' wire:model='promoType'>
                                                                <option value='' disabled selected>Type</option>
                                                                <option value='flat'>Flat</option>
                                                                <option value='percentage'>Percentage</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('promoAmount')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    @error('promoType')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-4">
                                                    <label for="promoMinimum">Minimum Amount</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                          <div class="input-group-text">Rs.</div>
                                                        </div>
                                                        <input type="text" class="form-control" wire:model.debounce.1000ms="promoMinimum" placeholder="Enter Minimum Amount">
                                                    </div>
                                                    @error('promoMinimum')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="promoStartAt">Start At</label>
                                                    <input class="form-control" id="promoStartAt" wire:model.debounce.1000ms='promoStartAt'>
                                                    @error('promoStartAt')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="promoEndAt">End At</label>
                                                    <input class="form-control" id="promoEndAt" wire:model.debounce.1000ms='promoEndAt'>
                                                    @error('promoEndAt')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
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
@endpush
@push('scripts')
<script>
</script>
@endpush