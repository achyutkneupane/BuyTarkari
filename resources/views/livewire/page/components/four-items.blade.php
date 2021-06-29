<div class="flex justify-center py-5 my-5">
    <div class="flex flex-col items-center justify-center">
        <div>
            <h1 class="text-3xl font-bold uppercase">
                {{ $category->title }}
            </h1>
        </div>
        <div class="w-1/12 mt-2 border-2 border-brand-color"></div>
        <div class="flex flex-col w-full h-full gap-3 mt-8 md:flex-row">
        @foreach($fourProducts as $product)
        @livewire('page.components.product-component', ['product' => $product,'order'=>$order],key(time().$loop->index.$product->id))
        @endforeach
        </div>
        <a class="w-1/3 py-3 mt-6 text-center text-white border rounded md:w-1/6 bg-brand-color hover:bg-white hover:border-brand-color hover:text-brand-color" href="{{ route('viewCategory',$category->slug) }}">
            View All
        </a>
    </div>
</div>
