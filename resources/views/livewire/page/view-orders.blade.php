<div class="flex flex-col justify-between h-screen">
    @section('title','Orders')
    <div class="flex flex-col justify-start">
        <div>
        @livewire('page.components.navbar')
        </div>
        <div class="flex flex-col-reverse w-3/4 gap-4 mx-auto pt-44 md:pt-32 md:flex-row">
            <div class="flex flex-col items-center w-full gap-4 px-5 py-8 mt-2 mb-6 bg-white rounded-lg shadow">
                <div class="text-3xl uppercase">
                    Orders
                </div>
                @if($orders->count() > 0)
                @foreach($orders as $order)
                @livewire('page.components.view-order', ['order' => $order])
                @endforeach
                @else
                <div class="w-full px-4 py-2 text-center border">
                    No Orders Placed
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="w-full">
    @livewire('page.components.footer')
    </div>
</div>