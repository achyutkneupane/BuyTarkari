<div class="flex flex-col justify-between h-screen">
    <div class="flex flex-col justify-start">
        @section('title','Home')
        <div>
        @livewire('page.components.navbar')
        </div>
        <div class="w-3/4 mx-auto pt-44 md:pt-32">
            <div class="flex flex-col items-center justify-center w-full mt-2 ">
            @livewire('page.components.banners')
            @livewire('page.components.three-banners')
            @foreach($categories as $category)
            @livewire('page.components.four-items', ['category' => $category],key(time().$loop->index.$category->id))
            @endforeach
            </div>
        </div>
    </div>
    <div class="w-full b-0">
    @livewire('page.components.footer')
    </div>
</div>