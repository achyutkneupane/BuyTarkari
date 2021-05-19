<div class="w-screen h-screen">
    @section('title','Sign Up - ')
    <div class="absolute top-0 w-full h-full bg-center bg-cover"
    style="background-image:url('https://media.istockphoto.com/photos/assortment-of-the-fresh-vegetables-picture-id960871382?k=6&m=960871382&s=612x612&w=0&h=NKBKmf_ZmKtyseaYgy2-uU4YLH4KdcFZb2y8z-gdCCw=')">
        <span id="blackOverlay" class="w-full h-full absolute opacity-60 bg-black"></span>
    </div>
    <div class="relative w-full h-full flex justify-center items-center">
        <div class="bg-white leading-loose border w-full sm:w-9/12 md:6/12 lg:w-4/12 xl:w-3/12 mx-5 lg:mx-0 p-5 flex flex-col rounded-lg shadow-xl">
            <div class="text-black text-center text-2xl font-bold mb-3">
                Register to {{ config('app.name', 'Laravel') }}
            </div>
            <div class="flex flex-col my-1">
                <label for="email" class="text-md text-gray-700">Email:</label>
                <input type="text" id="email" wire:model.lazy="email" class="border border-gray-400 rounded-lg px-4 py-1" />
                @error('email')
                    <div class="text-red-700">{!! $message !!}</div>
                @enderror
            </div>
            <div class="flex flex-col my-1">
                <label for="name" class="text-md text-gray-700">Name:</label>
                <input type="text" id="name" wire:model.lazy="name" class="border border-gray-400 rounded-lg px-4 py-1" />
                @error('name')
                    <div class="text-red-700">{!! $message !!}</div>
                @enderror
            </div>
            <div class="flex flex-col my-1">
                <div class="flex flex-wrap">
                    <label for="password" class="text-md text-gray-700 w-6/12">Password:</label>
                    <a href="#" class="text-md text-blue-700 w-6/12 text-right">Forgot Password?</a>
                </div>
                <input type="password" id="password" wire:model.lazy="password" class="border border-gray-400 rounded-lg px-4 py-1" />
                @error('password')
                    <div class="text-red-700">{!! $message !!}</div>
                @enderror
            </div>
            <div class="flex flex-col my-1">
                <label for="password_confirmation" class="text-md text-gray-700">Confirmation Password:</label>
                <input type="password" id="password_confirmation" wire:model.lazy="password_confirmation" class="border border-gray-400 rounded-lg px-4 py-1" />
                @error('password_confirmation')
                    <div class="text-red-700">{!! $message !!}</div>
                @enderror
            </div>
            <div class="flex my-1 w-full justify-center">
                <div class="flex w-4/12 border">
                    <button class="w-full bg-gray-700 text-white p-2 text-center rounded-lg" wire:click="signup">Sign Up</button> 
                </div>
            </div>
            <div class="text-black text-center">
                Already have an account? <a class="text-blue-700 font-bold" href="{{ route('login') }}">Sign In</a>
            </div>
        </div>
    </div>
</div>