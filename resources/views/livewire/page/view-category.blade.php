<div class="flex flex-col justify-between h-screen">
    <div class="flex flex-col justify-start">
        @section('title',$category->title)
        <div>
        @livewire('page.components.navbar')
        </div>
        <div class="w-3/4 mx-auto pt-44 md:pt-32">
            <div class="flex justify-center w-full gap-8 my-10">
                <div class="flex flex-col items-start hidden w-1/4 p-4 mt-2 overflow-y-auto bg-white h-1/4 md:block">
                    <div class="w-full text-xl font-bold uppercase border-b text-brand-color">
                        Filter
                    </div>
                    <div class="flex flex-col w-full py-4 border-b">
                        <label for='sorter' class="uppercase">
                            Sort By
                        </label>
                        <select id="sorter" wire:model='sortBy' class="px-4 py-3 my-2 border rounded">
                            <option value="" disabled selected>Select An Option</option>
                            {{-- <option value="popular">Popular First</option> --}}
                            <option value="new">New First</option>
                            <option value="expensive">Highest Amount First</option>
                            <option value="cheap">Lowest Amount First</option>
                            <option value="rating">Highest Rated First</option>
                        </select>
                    </div>
                    <div class="flex flex-col w-full py-4 border-b">
                        <label for='keyword' class="uppercase">
                            Search
                        </label>
                        <input type="text" id="keyword" class="px-4 py-3 my-2 border rounded" placeholder="Search for item........" wire:model='search'>
                    </div>
                    <div class="flex flex-col w-full py-4 border-b">
                        <label for='brand' class="uppercase">
                            Brand
                        </label>
                        @livewire('page.components.brand-list', ['brands' => $brands])
                    </div>
                    <div class="flex flex-col w-full py-4 border-b">
                        <label for='price_range' class="uppercase">
                            Price Range
                        </label>
                        <div class="flex w-full gap-2">
                            <input type="number" id="minimum_price" class="w-1/2 py-3 pl-4 my-2 border rounded" wire:model='minPrice' placeholder="Minimum">
                            <input type="number" id="maximum_price" class="w-1/2 py-3 pl-4 my-2 border rounded" wire:model='maxPrice' placeholder="Maximum">
                        </div>
                    </div>
                    <div class="flex flex-col w-full py-4">
                        <label for='rating' class="uppercase">
                            By Rating
                        </label>
                        <div class="flex w-full gap-2 mt-2 text-yellow-600 justify-evenly">
                            <div>1/5</div>
                            <div>2/5</div>
                            <div>3/5</div>
                            <div>4/5</div>
                            <div>5/5</div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-3/4">
                    <div class="flex flex-col flex-wrap w-full md:flex-row" wire:loading.class='opacity-25'>
                        @if($products->count() > 0)
                        @foreach($products as $product)
                        <div class="w-full p-2 md:w-1/3" wire:loading.class='opacity-25'>
                            @livewire('page.components.product-component', ['product' => $product],key(time().$loop->index.$product->id))
                        </div>
                        @endforeach
                        @else
                        <div class="w-full p-2 text-xl text-center bg-white border text-brand-color" wire:loading.class='opacity-25'>
                            No Items Found
                        </div>
                        @endif
                    </div>
                    <div class="w-full mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full b-0">
    @livewire('page.components.footer')
    </div>
</div>