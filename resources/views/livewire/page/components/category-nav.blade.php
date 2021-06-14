<div class="flex w-full p-2 text-lg text-center text-white shadow bg-brand-color justify-evenly">
    @foreach($categories as $category)
    <a href="{{ route('viewCategory',$category->slug) }}">{{ $category->title }}</a>
    @endforeach
    <div>All</div>
</div>
