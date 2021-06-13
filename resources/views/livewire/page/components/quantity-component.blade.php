<div class="flex items-center text-left text-gray-600">
    <button class="p-2 bg-gray-100 rounded-l-full shadow cursor-pointer" wire:click="decrement"{{ $qty==1 ? 'disabled' : '' }}>-</button>
    <div class=""><input type="text" value="{{ $qty }}" class="w-12 p-2 text-center border shadow" disabled></div>
    <button class="p-2 bg-gray-100 rounded-r-full shadow cursor-pointer" wire:click="increment">+</button>
    <div class="ml-2">{{ ucfirst($unit) }}</div>
</div>