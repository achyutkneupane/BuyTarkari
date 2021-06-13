<div class="flex flex-col justify-between h-screen">
    @section('title','Cart')
    <div class="flex flex-col justify-start">
        <div>
        @livewire('page.components.navbar')
        </div>
        <div class="w-3/4 mx-auto pt-44 md:pt-32">
            <div class="flex flex-col items-center justify-center w-full gap-8 px-5 py-8 mt-2 mb-6 bg-white rounded-lg shadow md:w-2/3">
                <div class="text-3xl uppercase">
                    Cart
                </div>
                @if($cart->count() > 0)
                @foreach($cart as $item)
                @livewire('page.components.cart-item', ['cartId' => $item->rowId])
                @endforeach
                @else
                <div class="w-full px-4 py-2 text-center border">
                    No items in Cart
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="w-full">
    @livewire('page.components.footer')
    </div>
</div>