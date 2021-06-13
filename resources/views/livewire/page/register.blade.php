<div class="w-screen h-screen">
    @section('title','Sign Up')
    <div class="absolute top-0 w-full h-full bg-center bg-cover"
    style="background-image:url('https://media.istockphoto.com/photos/assortment-of-the-fresh-vegetables-picture-id960871382?k=6&m=960871382&s=612x612&w=0&h=NKBKmf_ZmKtyseaYgy2-uU4YLH4KdcFZb2y8z-gdCCw=')">
        <span id="blackOverlay" class="absolute w-full h-full bg-black opacity-60"></span>
    </div>
    <div class="relative flex items-center justify-center w-full h-full">
        <div class="flex flex-col w-full p-5 mx-5 leading-loose bg-white border rounded-lg shadow-xl sm:w-9/12 md:6/12 lg:w-4/12 xl:w-3/12 lg:mx-0">
            <div class="mb-3 text-2xl font-bold text-center text-black">
                Register to {{ config('app.name', 'Laravel') }}
            </div>
            <div class="flex flex-col my-1">
                <label for="email" class="text-gray-700 text-md">Email:</label>
                <input type="text" id="email" wire:model.lazy="email" class="px-4 py-1 border border-gray-400 rounded-lg" />
                @error('email')
                    <div class="text-red-700">{!! $message !!}</div>
                @enderror
            </div>
            <div class="flex flex-col my-1">
                <label for="name" class="text-gray-700 text-md">Name:</label>
                <input type="text" id="name" wire:model.lazy="name" class="px-4 py-1 border border-gray-400 rounded-lg" />
                @error('name')
                    <div class="text-red-700">{!! $message !!}</div>
                @enderror
            </div>
            <div class="flex flex-col my-1">
                <div class="flex flex-wrap">
                    <label for="password" class="text-gray-700 text-md">Password:</label>
                </div>
                <input type="password" id="password" wire:model.lazy="password" class="px-4 py-1 border border-gray-400 rounded-lg" />
                @error('password')
                    <div class="text-red-700">{!! $message !!}</div>
                @enderror
            </div>
            <div class="flex flex-col my-1">
                <label for="password_confirmation" class="text-gray-700 text-md">Confirmation Password:</label>
                <input type="password" id="password_confirmation" wire:model.lazy="password_confirmation" class="px-4 py-1 border border-gray-400 rounded-lg" />
                @error('password_confirmation')
                    <div class="text-red-700">{!! $message !!}</div>
                @enderror
            </div>
            <div class="flex justify-center w-full my-1">
                <div class="flex w-4/12 border">
                    <button class="w-full p-2 text-center text-white bg-gray-700 rounded-lg" wire:click="signup">Sign Up</button> 
                </div>
            </div>
            <div class="text-center text-black">
                Already have an account? <a class="font-bold text-blue-700" href="{{ route('login') }}">Sign In</a>
            </div>
        </div>
    </div>
</div>