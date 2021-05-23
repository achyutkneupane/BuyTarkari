<div class="z-0 w-full transition duration-500 transform hover:scale-105">
    <div class="flex flex-col justify-center p-2 overflow-hidden bg-white shadow">
        <div class="overflow-hidden">
            <img class="object-center w-full transition transform h-72 duration-1500 hover:scale-150" src="https://dummyimage.com/1200x800/000000/ffffff&text=Product{{ $i }}">
        </div>
        <div class="my-2 text-2xl text-center text-brand-color">
            Title{{ $i }}
        </div>
        <div class="flex flex-row items-center justify-between">
            <div class="font-bold text-left text-gray-400 uppercase">
                Brand{{ $i }}
            </div>
            <div class="flex text-right">
                @for($j=1;$j<=5;$j++)
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="{{ (5-($i%3))>=$j ? 'goldenrod' : 'none'  }}" viewBox="0 0 24 24" stroke="goldenrod">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
                @endfor
            </div>
        </div>
        <div class="text-2xl">
            @if($i==3)
            <span class="line-through">Rs. {{ $i }}000</span>
            <span class="text-red-600">Rs. {{ $i-1 }}000</span>
            @else
            Rs. {{ $i }}000
            @endif
        </div>
        <div class="flex flex-row items-center justify-between my-2">
            @livewire('page.components.quantity-component')
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="{{ $i == 2 ? 'red' : 'none' }}" viewBox="0 0 24 24" stroke="{{ $i == 2 ? 'red' : 'currentColor' }}">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </div>
        </div>
        <button class="w-full px-3 py-2 mt-2 text-center text-white cursor-pointer rounded-xl bg-brand-color" disabled>
            Add To Card
        </button>
    </div>
</div>