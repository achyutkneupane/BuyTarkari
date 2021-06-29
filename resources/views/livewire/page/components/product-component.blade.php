<div class="z-0 w-full" wire:loading.class='opacity-10' wire:target='addToCart,removeFromCart'>
    <div class="flex flex-col justify-center p-2 overflow-hidden bg-white shadow">
        <a class="flex flex-col" href="{{ route('viewItem',$product->slug) }}">
            <div class="overflow-hidden">
                <img class="object-center w-full transition transform h-72 duration-1500 hover:scale-150" src="https://dummyimage.com/1200x800/000000/ffffff&text=Product{{ $product->id }}" alt="{{ $product->title }} - {{ config('app.name') }}">
            </div>
            <div class="my-2 text-xl text-center text-brand-color">
                {{ $product->title }}
            </div>
            <div class="flex flex-row items-center justify-between">
                <div class="font-bold text-left text-gray-400 uppercase">
                    {{ $product->brand ? $product->brand->title : 'N/A' }}
                </div>
                <div class="flex text-right">
                    @for($j=1;$j<=5;$j++)
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="{{ ($rating >= $j) ? 'goldenrod' : 'none' }}" viewBox="0 0 24 24" stroke="goldenrod">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                    @endfor
                    {{-- @else
                    <div class='font-bold text-yellow-500 uppercase'>
                        No Ratings
                    </div>
                    @endif --}}
                </div>
            </div>
            <div class="text-xl">
                @if($product->discount_flag)
                <span class="text-sm line-through">Rs. {{ $product->price }}</span> <span class="text-red-600">Rs. {{ $product->net_price }}</span>
                @else
                Rs. {{ $product->net_price }}
                @endif
            </div>
        </a>
        <div class="flex flex-col">
            <div class="flex flex-row items-center justify-between my-2">
                @if($inCart)
                <div class="pt-1 pb-2 text-xl font-bold uppercase">
                    In Cart
                </div>
                @else
                @livewire('page.components.quantity-component', ['unit' => $product->unit, 'qty' => $qty])
                @endif
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 cursor-pointer" fill="{{ $inWL ? 'red' : 'none' }}" viewBox="0 0 24 24" stroke="{{ $inWL ? 'red' : 'currentColor' }}" wire:click='{{ $inWL ? 'removeFromWL' : 'addToWL' }}'>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
            </div>
            @if($inCart)
            <button class="w-full px-3 py-2 mt-2 text-center text-white bg-red-800 cursor-pointer rounded-xl" wire:click='removeFromCart'>
                Cancel
            </button>
            @else
            <button class="w-full px-3 py-2 mt-2 text-center text-white cursor-pointer rounded-xl bg-brand-color" wire:click='addToCart'>
                Add To Cart
            </button>
            @endif
        </div>
    </div>
</div>