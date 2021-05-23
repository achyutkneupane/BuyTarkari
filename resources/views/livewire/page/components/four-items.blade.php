<div class="flex justify-center py-5 my-10">
    <div class="flex flex-col items-center justify-center">
        <div>
            <h1 class="text-3xl font-bold uppercase">
                Category Title
            </h1>
        </div>
        <div class="w-1/12 mt-2 border-2 border-brand-color"></div>
        <div class="flex flex-col w-full gap-3 mt-8 md:flex-row">
        @for($i=1;$i<=4;$i++)
        @livewire('page.components.product-component', ['i' => $i])
        @endfor
        </div>
    </div>
</div>
