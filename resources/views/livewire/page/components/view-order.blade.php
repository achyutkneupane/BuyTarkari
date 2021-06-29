<div class='flex flex-col w-full border md:flex-row'>
    <div class="flex flex-col w-full p-2 md:w-4/5">
        <div class="flex flex-row gap-3 text-2xl align-center">
            <div class='flex align-center'>
                <div class='my-auto uppercase text-brand-color'>
                    Order #<b>{{ $order->id }}</b>
                </div>
            </div>
            <div class='inline p-2 text-base text-white border rounded-full bg-brand-color'>
                {{ ucwords($order->status) }}
            </div>
        </div>
        <div class="flex flex-col gap-2 md:flex-row">
            <div class="w-full px-2 lg:w-1/5 md:w-1/3">
                <b>Products({{ $order->products->count() }})</b>:
            </div>
            <div class="flex flex-col w-full px-2 lg:w-4/5 md:w-2/3">
                @foreach($order->products as $product)
                <div>
                    {{ $product->title }} x<b>{{ $product->pivot->quantity }}</b>
                </div>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col gap-2 md:flex-row">
            <div class="w-full px-2 lg:w-1/5 md:w-1/3">
                <b>Placed At</b>:
            </div>
            <div class="flex flex-col w-full gap-2 px-2 lg:w-4/5 md:w-2/3">
                {{ $order->created_at->isoFormat('Y-MM-D') }}
            </div>
        </div>
    </div>   
    <div class="flex flex-col justify-center w-full gap-2 p-2 md:w-1/5"> 
        <div class="flex flex-row items-end justify-between w-full">
            <div class="font-bold">
                Total:
            </div>
            <div class="text-2xl font-bold text-brand-color">
                Rs. {{ $total }}
            </div>
        </div>
    </div>
</div>