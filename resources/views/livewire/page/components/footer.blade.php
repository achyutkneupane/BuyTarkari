<div class="items-center">
    <footer class="justify-end text-gray-700 transition duration-500 ease-in-out transform bg-white border rounded-lg">
        <div class="flex flex-col flex-wrap justify-between w-full p-8 mx-auto md:w-2/3 md:items-center lg:items-start md:flex-row md:flex-no-wrap">
            <div class="flex-shrink-0 w-64 px-8 text-left md:px-0">
                <h1 class="text-2xl font-bold uppercase text-brand-color">
                    {{ config('app.name') }}
                </h1>
                <div class="flex flex-col">
                    <div class="flex w-full">
                        <div class="w-1/4 font-bold">
                            Email: 
                        </div>
                        <div class="w-3/4">
                            test@email.com
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap justify-end flex-grow mt-8 -mb-10 text-left md:mt-0">
                <div class="w-full px-4 text-left md:text-right lg:w-1/3 md:w-1/2">
                    <h1 class="px-4 py-1 mr-1 text-lg font-medium tracking-wide uppercase transition duration-500 ease-in-out transform rounded-md text-brand-color focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 ">Links</h1>
                    <nav class="mb-10 list-none">
                        @for($i=1;$i<=5;$i++)
                        <li>
                            <a class="px-4 py-1 mr-1 text-sm text-gray-500 transition duration-500 ease-in-out transform rounded-sm focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 ">Link{{ $i }}</a>
                        </li>
                        @endfor
                    </nav>
                </div>
            </div>
        </div>
        <div class="w-full mt-2 text-center border-t rounded-b-lg bg-blueGray-100">
            <p class="pt-2 text-center text-white bg-brand-color">
                © {{ config('app.name') }} {{ now()->year }}<br>Developed by <a href="https://achyut.com.np" class="text-center text-gray-200 hover:text-white" target="_blank">Achyut</a>
            </p>
        </div>
    </footer>
</div>