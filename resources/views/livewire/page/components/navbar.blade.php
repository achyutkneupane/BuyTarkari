<div class="fixed z-50 items-center w-full">
    <div class="text-gray-700 transition duration-500 ease-in-out transform bg-white border rounded-lg">
        <div class="flex flex-col justify-between w-full px-5 py-1 mx-auto border md:items-center md:flex-row">
            <div class="flex justify-between md:contents">
                <div class="order-1">
                    <a class="block p-2 text-xl font-normal tracking-tighter text-gray-500 transition duration-500 ease-in-out transform cursor-pointer hover:text-gray-500 md:text-x" href="{{ route('landing_page') }}">
                        {{ config('app.name') }}
                    </a>
                </div>
                <div class="flex items-center order-2 md:order-3">
                    <nav class="flex flex-wrap items-center justify-center text-base lg:mr-auto">
                    @guest
                    <a href="{{ route('login') }}" class="px-4 py-1 mr-1 text-base text-gray-500 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 ">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-1 mr-1 text-base text-gray-500 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 ">Register</a>
                    @else
                    @admin
                    <a href="{{ route('adminDashboard') }}" class="px-4 py-1 mr-1 text-base text-gray-500 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 ">Admin Panel</a>
                    @else
                    <a href="#" class="px-4 py-1 mr-1 text-base text-gray-500 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 ">Profile</a>
                    @endadmin
                    <a href="{{ route('logout') }}" class="px-4 py-1 mr-1 text-base text-gray-500 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 ">Logout</a>
                    @endguest
                    </nav>
                    @livewire('page.components.cart')
                </div>
            </div>
            {{-- <div class="relative justify-end order-2 w-full my-2 mr-6 md:w-1/3 md:order-2">
                <input type="search" name="serch" placeholder="Search for products......." class="w-full h-10 px-5 pr-10 text-sm bg-white border rounded-lg focus:outline-none">
                <div class="absolute top-0 right-0 mt-3 mr-4">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                    </svg>
                </div>
            </div> --}}
        </div>
    </div>
    @livewire('page.components.category-nav')
</div>