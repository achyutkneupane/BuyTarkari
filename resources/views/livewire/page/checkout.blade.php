<div class="flex flex-col justify-between h-screen">
    @section('title','Checkout')
    <div class="flex flex-col justify-start">
        <div>
        @livewire('page.components.navbar')
        </div>
        <div class="flex flex-col-reverse justify-center w-5/6 gap-4 mx-auto pt-44 md:pt-32 md:flex-row">
            <div class="flex flex-col items-center w-full gap-8 px-5 py-8 mt-2 mb-6 bg-white rounded-lg shadow md:w-4/5">
                <div class="text-3xl uppercase">
                    Checkout
                </div>
                <div class="flex flex-col-reverse justify-between w-full gap-8 md:flex-row">
                    <div class='w-full md:w-2/3'>
                        <h2 class='text-xl'>
                            Payment Method
                        </h2>
                        @foreach($payments as $payment)
                        <div class="mx-4 my-2">
                            <input type="radio" id="payment{{ $payment->id }}" wire:model="payment" name="payment" value="{{ $payment->id }}">
                            <label for="payment{{ $payment->id }}">{{ $payment->title }}</label><br>
                            <div class='mx-4'>
                                {!! $payment->content !!}
                            </div>
                        </div>
                        @endforeach
                        @error('payment')
                        <div class="text-red-800">{{ $message }}</div>
                        @enderror
                        <h2 class='py-4 text-xl'>
                            Delivery Option
                        </h2>
                        <div class="mx-4 my-2">
                            @if(!$addAddressFlag)
                            <button class="p-2 text-center text-white border rounded bg-brand-color" wire:click='toggleAddAddressFlag'>
                                Add Address
                            </button>
                            @else
                            <div class="w-full my-4">
                                <div class="flex flex-col gap-4">
                                    <div class="w-full text-2xl text-center">
                                        Add Address
                                    </div>
                                    <div class='flex flex-col w-full gap-4 md:flex-row'>
                                        <div class="w-full md:w-1/2">
                                            <input type='text' class='w-full p-2 border' wire:model.lazy='first_name' placeholder="Enter First Name">
                                            @error('first_name')
                                            <div class='text-red-800'>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="w-full md:w-1/2">
                                            <input type='text' class='w-full p-2 border' wire:model.lazy='last_name' placeholder="Enter Last Name">
                                            @error('last_name')
                                            <div class='text-red-800'>{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class='flex flex-col w-full gap-4 md:flex-row'>
                                        <div class="w-full md:w-1/2">
                                          <input type='text' class='w-full p-2 border' wire:model.lazy='number' placeholder="Enter Contact Number">
                                          @error('number')
                                          <div class='text-red-800'>{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="w-full md:w-1/2">
                                            <input type='text' class='w-full p-2 border' wire:model.lazy='company' placeholder="Enter Company Name (Optional)">
                                            @error('company')
                                            <div class='text-red-800'>{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class='flex flex-col w-full gap-4 md:flex-row'>
                                        <div class="w-full md:w-1/2">
                                          <input type='text' class='w-full p-2 border' wire:model.lazy='province' placeholder="Enter Province">
                                          @error('province')
                                          <div class='text-red-800'>{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="w-full md:w-1/2">
                                          <input type='text' class='w-full p-2 border' wire:model.lazy='city' placeholder="Enter City Name">
                                          @error('city')
                                          <div class='text-red-800'>{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class='flex flex-col w-full gap-4 md:flex-row'>
                                        <div class="w-full md:w-1/2">
                                            <input type='text' class='w-full p-2 border' wire:model.lazy='street_01' placeholder="Enter Street Address 1">
                                            @error('street_01')
                                            <div class='text-red-800'>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="w-full md:w-1/2">
                                            <input type='text' class='w-full p-2 border' wire:model.lazy='street_02' placeholder="Enter Street Address 2 (Optional)">
                                            @error('street_02')
                                            <div class='text-red-800'>{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-center w-full gap-4 my-2 align-middle">
                                    <button class="w-1/3 p-2 text-center text-white border rounded md:w-1/5 bg-brand-color" wire:click='addAddress'>
                                        Add
                                    </button>
                                    <button class="w-1/3 p-2 text-center text-white bg-red-700 border rounded md:w-1/5" wire:click='toggleAddAddressFlag'>
                                        Cancel
                                    </button>
                                </div>
                            </div>
                            @endif
                            <div class="flex flex-row justify-start w-full my-2">
                                <div class="flex flex-col justify-center w-1/3">
                                    Shipping Address
                                </div>
                                <div class="w-2/3">
                                    <select wire:model='shipping_address' class="w-full p-2 border">
                                        <option value='' selected disabled>Select an Address</option>
                                        @foreach($addresses as $address)
                                        <option value="{{ $address->id }}">
                                            {{ $address->first_name }} {{ $address->last_name }}, {{ $address->street_01 }}, {{ $address->city }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('shipping_address')
                            <div class='flex justify-end'>
                                <div class="w-2/3 text-red-800">{{ $message }}</div>
                            </div>
                            @enderror
                            <div class="flex flex-row justify-start w-full my-2">
                                <div class="flex flex-col justify-center w-1/3">
                                    Billing Address
                                </div>
                                <div class="w-2/3">
                                    <select wire:model='billing_address' class="w-full p-2 border">
                                        <option value='' selected disabled>Select an Address</option>
                                        @foreach($addresses as $address)
                                        <option value="{{ $address->id }}">
                                            {{ $address->first_name }} {{ $address->last_name }}, {{ $address->street_01 }}, {{ $address->city }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('billing_address')
                            <div class='flex justify-end'>
                                <div class="w-2/3 text-red-800">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class='flex flex-col justify-between w-full md:w-1/3'>
                        <div>
                            <div class="flex flex-row justify-between w-full">
                                <div class="font-bold">
                                    Sub Total:
                                </div>
                                <div>
                                    {{ $initial }}
                                </div>
                            </div>
                            <div class="flex flex-row justify-between w-full">
                                <div class="font-bold">
                                    Discount:
                                </div>
                                <div>
                                    - {{ $discount }}
                                </div>
                            </div>
                            <div class="w-full">
                                @if($promoFlag)
                                <div class="flex flex-row justify-between w-full">
                                    <div class="font-bold">
                                        Promo Code Applied: <div class="inline font-normal text-red-800">{{ $cart->promocode->type == 'percentage' ? '('.$cart->promocode->discount.'% off)' : '' }}{{ $cart->promocode->type == 'flat' ? '(Rs. '.$cart->promocode->discount.' off)' : '' }}</div>
                                    </div>
                                    <div>
                                        - {{ $promo }}
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="flex flex-row items-end justify-between w-full mt-4 divide-y divide-brand-color">
                                <div class="font-bold">
                                    Total:
                                </div>
                                <div class="text-2xl font-bold text-brand-color">
                                    Rs. {{ $total }}
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="w-full p-2 text-center text-white border rounded bg-brand-color" wire:click='checkout'>
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full">
    @livewire('page.components.footer')
    </div>
</div>