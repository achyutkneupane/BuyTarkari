<div class="w-full">
    <div class="flex flex-row justify-between w-full gap-4 p-2 overflow-auto text-lg text-center text-white shadow bg-brand-color md:justify-evenly">
        @foreach($categories as $category)
        <a href="{{ route('viewCategory',$category->slug) }}">{{ $category->title }}</a>
        @endforeach
    </div>    
</div>