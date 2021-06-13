<div class="flex w-full p-2 text-lg text-center text-white shadow bg-brand-color justify-evenly">
    @foreach($categories as $category)
    <div>{{ $category->title }}</div>
    @endforeach
    <div>All</div>
</div>
