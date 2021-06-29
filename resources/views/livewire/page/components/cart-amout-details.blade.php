<div class="flex flex-col items-center w-full px-5 py-8 mt-2 mb-6 bg-white rounded-lg shadow md:w-1/3">
    <div class="mb-8 text-3xl uppercase">
        Details
    </div>
    <div class="w-full" wire:loading.class='opacity-10'>
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
            @if(!$promoFlag)
            <div class="w-full my-4">
                <label>Enter Promo Code(If Any)</label>
                <input type="text" wire:model.lazy="promoCode" class="w-full p-2 border rounded" placeholder="Promo Code">
                @error('promoCode')
                    <div class="text-red-800">{{ $message }}</div>
                @enderror
                <button class="w-full p-2 mt-2 text-white border rounded-lg bg-brand-color" wire:click='usePromoCode'>Apply Code</button>
            </div>
            @else
            <div class="flex flex-row justify-between w-full">
                <div class="font-bold">
                    Promo Code Applied: <div class="inline font-normal text-red-800">{{ $cart->promocode->type == 'percentage' ? '('.$cart->promocode->discount.'% off)' : '' }}{{ $cart->promocode->type == 'flat' ? '(Rs. '.$cart->promocode->discount.' off)' : '' }}</div>
                    <div class="font-bold text-red-600 underline cursor-pointer hover:no-underline" wire:click='removePromoCode'>Cancel</div>
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
        @if($cart->count())
        <a href="{{ route('viewCheckout') }}" class="w-full mt-8">
            <div class="w-full p-2 mt-8 text-center text-white border rounded-lg bg-brand-color">Proceed to Checkout</div>
        </a>
        @endif
    </div>
</div>