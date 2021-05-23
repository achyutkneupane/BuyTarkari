<div class="flex flex-col justify-center w-full h-auto gap-8 mt-8 md:flex-row">
    @for($i=1;$i<=3;$i++)
    <div class="w-full">
        <img src="https://dummyimage.com/500x400/000000/ffffff&text=Banner{{ $i }}" alt="Banner{{ $i }} - {{ config('app.name') }}" class="w-full">
    </div>
    @endfor
</div>