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
                                        <h5 class="card-title">{{ $title }}</h5>
                                        <div class="px-3 py-2 btn btn-success" wire:click='toggleAddPayment'>+ Add</div>
                                    </div>
                                    <p class="card-text">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                              <tr class="text-center">
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Descrition</th>
                                                <th scope="col">Orders Count</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-right">Actions</th>
                                              </tr>
                                            </thead>
                                            <tbody class="user-select-none">
                                                @if($payments->count() > 0)
                                                @foreach ($payments as $payment)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        @if($payment->id == $this->editable)
                                                        <input type="text" class="form-control" wire:model.lazy='paymentTitle'>
                                                        @else
                                                        {{ $payment->title }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($payment->id == $this->editable)
                                                        <textarea rows='5' class="form-control" wire:model.lazy='paymentContent'></textarea>
                                                        @else
                                                        {{ $payment->content }}
                                                        @endif
                                                    </td>
                                                    <td class='text-center'>
                                                        {{ $payment->orders->count() }}
                                                    </td>
                                                    <td class="text-center" wire:click="toggleStatus({{ $payment->id }},'{{ $payment->status }}')">
                                                        <label class="switch">
                                                            <input type="checkbox"{{ $payment->status == true ? ' checked' : '' }}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td class="text-right">
                                                        @if($payment->id == $this->editable)
                                                        <button class="mx-1 btn btn-success" wire:click="confirmEditPayment">Save</button>
                                                        @else
                                                        <button class="mx-1 btn btn-warning" wire:click="editPayment({{ $payment->id }})">Edit</button>
                                                        @endif
                                                        <button class="mx-1 btn btn-danger" wire:click="removePayment({{ $payment->id }})">Remove</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                @if(!$addPayment)
                                                <tr>
                                                    <td colspan="8" class="text-center">
                                                        No Payment Methods till now. Click <b>+Add</b> to add new.
                                                    </td>
                                                </tr>
                                                @endif
                                                @endif
                                                @if($addPayment)
                                                <tr>
                                                    <td colspan='2'>
                                                        <div class="form-group row">
                                                            <label class='col-lg-3'>Title</label>
                                                            <div class='col-lg-9'>
                                                                <input type="text" class="form-control" wire:model.lazy='paymentTitle'>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td colspan='3'>
                                                        <div class="form-group row">
                                                            <label class='col-lg-3'>Description</label>
                                                            <div class='col-lg-9'>
                                                                <textarea rows='5' class="form-control" wire:model.lazy='paymentContent'></textarea>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mx-1 btn btn-success" wire:click='addPayment'>Add</div>
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
@endpush