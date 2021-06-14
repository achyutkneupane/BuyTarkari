<div class="flex flex-col justify-between h-screen">
    <div class="flex flex-col justify-start">
        @section('title',$product->title)
        <div>
        @livewire('page.components.navbar')
        </div>
        <div class="w-3/4 mx-auto pt-44 md:pt-32">
            <div class="flex flex-col items-center justify-center w-full gap-8 px-5 py-20 mt-2 mb-6 bg-white rounded-lg shadow md:flex-row">
                <div class="flex justify-center w-full overflow-hidden md:w-7/12">
                    <img class="object-center w-full transition transform h-72 duration-1500 hover:scale-125" src="https://dummyimage.com/1200x800/000000/ffffff&text=Product{{ $itemId }}">
                </div>
                <div class="flex flex-col justify-center w-full">
                    <div class="mb-3 text-3xl font-bold uppercase">
                        {{ $product->title }}
                    </div>
                    <div class="flex items-center mb-1 ">
                        <div class="w-1/3 font-bold">
                            Rating:
                        </div>
                        <div class="flex items-center w-2/3">
                            @for($j=1;$j<=5;$j++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="{{ (3>=$j) ? 'goldenrod' : 'none'  }}" viewBox="0 0 24 24" stroke="goldenrod">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                            @endfor
                        </div>
                    </div>
                    <div class="flex items-center mb-1 ">
                        <div class="w-1/3 font-bold">
                            Price:
                        </div>
                        <div class="w-2/3 text-gray-600">
                            @if($product->discount_amount)
                            <span class="line-through">Rs. {{ $product->price }}</span>
                            @if($product->discount_type == 'flat')
                            <span class="text-red-600">Rs. {{ $product->price-$product->discount_amount }}</span>
                            @elseif($product->discount_type == 'percentage')
                            <span class="text-red-600">Rs. {{ round($product->price-($product->price*$product->discount_amount/100),0) }} ({{ $product->discount_amount }}% off)</span>
                            @endif
                            @else
                            Rs. {{ $product->price }}
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center mb-1 ">
                        <div class="w-1/3 font-bold">
                            Category:
                        </div>
                        <div class="w-2/3 font-bold text-gray-600">
                            {{ $product->category->title }}
                        </div>
                    </div>
                    <div class="flex items-center mb-1 ">
                        <div class="w-1/3 font-bold">
                            Brand:
                        </div>
                        <div class="w-2/3 font-bold text-gray-600">
                            {{ $product->brand->title }}
                        </div>
                    </div>
                    @if($inCart)
                    <div class="text-2xl font-bold text-red-800 uppercase" wire:loading.class='opacity-10' wire:target='addToCart,removeFromCart'>
                        In Cart
                    </div>
                    @else
                    <div class="flex items-center mb-1 " wire:loading.class='opacity-10' wire:target='addToCart,removeFromCart'>
                        <div class="w-1/3 font-bold">
                            Quantity:
                        </div>
                        <div class="w-2/3">
                            @livewire('page.components.quantity-component', ['unit' => $product->unit,'qty' => $qty])
                        </div>
                    </div>
                    @endif
                    @if(!$inCart)
                    <div class="flex items-center mb-1 " wire:loading.class='opacity-10' wire:target='addToCart,removeFromCart'>
                        <div class="w-1/3 text-xl font-bold text-brand-color">
                            IN STOCK
                        </div>
                    </div>
                    @endif
                    <div class="flex items-center mt-2" wire:loading.class='opacity-10' wire:target='addToCart,removeFromCart'>
                        @if($inCart)
                        <button class="w-full p-3 text-center text-white bg-red-800 border rounded-lg cursor-pointer md:w-1/5" wire:click='removeFromCart'>
                            Cancel
                        </button>
                        @else
                        <div class="w-full p-3 text-center text-white border rounded-lg cursor-pointer md:w-1/5 bg-brand-color" wire:click='addToCart'>
                            Add To Cart
                        </div>
                        @endif
                        <div class="text-center ml-9">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="{{ $itemId == 2 ? 'red' : 'none' }}" viewBox="0 0 24 24" stroke="{{ $itemId == 2 ? 'red' : 'currentColor' }}">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
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