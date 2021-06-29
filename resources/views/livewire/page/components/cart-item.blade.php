<div class="w-full px-4 py-2 border">
    <div class="flex flex-col justify-between md:flex-row">
        <div class="flex flex-row justify-start gap-4">
            <div class="overflow-hidden">
                <img class="object-center w-24 h-24 transition transform duration-1500 hover:scale-125" src="https://dummyimage.com/1200x800/000000/ffffff&text=Product{{ $product->id }}">
            </div>
            <div class="flex flex-col justify-center">
                <div class="text-xl text-brand-color">
                    {{ $product->title }}
                </div>
                <div class="flex justify-start gap-2">
                    <div class="font-bold">
                        Price:
                    </div>
                    <div>
                        @if($product->discount_flag)
                        <span class="line-through">Rs. {{ $product->price }}</span> <span class="text-red-600">Rs. {{ $product->net_price }}</span>
                        @else
                        Rs. {{ $product->price }}
                        @endif
                    </div>
                </div>
                <div class="flex justify-start gap-2">
                    <div class="font-bold">
                        Total:
                    </div>
                    <div>
                        @if($product->discount_flag)
                        <span class="line-through">Rs. {{ $qty*$product->price }}</span> <span class="text-red-600">Rs. {{ $qty*$product->net_price }}</span>
                        @else
                        Rs. {{ $qty*$product->price }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-start justify-center gap-2 mt-4 md:mt-0">
            <div class="flex justify-start gap-2">
                <div class="flex items-center font-bold">
                    Quantity:
                </div>
                <div>
                @livewire('page.components.quantity-component', ['unit' => $product->unit, 'qty' => $qty ])
                </div>
            </div>
            <button class="w-full p-3 text-center text-white bg-red-800 border rounded-lg cursor-pointer" wire:click='removeFromCart'>
                Remove from Cart
            </button>
        </div>
    </div>
</div>