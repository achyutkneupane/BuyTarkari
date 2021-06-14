<div class="w-full">
    <input type="text" id="brand" class="w-full px-4 py-3 my-2 border rounded" placeholder="Search for brand........" wire:model='brandSearch'>
    <div class="flex flex-col h-48 px-4 py-2 overflow-scroll border" wire:loading.class='opacity-10'>
        @if(count($brands) > 0)
        @foreach($brands as $brand)
        <label><input type="checkbox" wire:model="brandSelected" value="{{ $brand->id }}" class="w-4 mr-2">{{ $brand->title }}</label>
        @endforeach
        @else
        <div class="text-gray-600">No Brands Found</div>
        @endif
    </div>
</div>