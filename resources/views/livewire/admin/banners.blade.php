<div class="w-full h-full">
    @include('layouts.sidebar')
    <div class="flex flex-col items-center justify-center h-full p-5 ml-64 rounded-lg">
        <div class="w-5/6 p-5 mt-2 mb-3 bg-white rounded-lg shadow">
            <div class="flex flex-col">
                <h1 class="pb-6 text-3xl text-center">
                    Site Banners
                </h1>
                <table class='w-full max-w-4xl mx-auto mb-3 overflow-hidden bg-white divide-y divide-gray-800 rounded-lg whitespace-nowrap'>
                    <thead class="bg-gray-300">
                        <tr class="text-left">
                            <th class="w-5/6 px-6 py-4 text-sm font-semibold text-center uppercase">
                                Banner
                            </th>
                            <th class="w-1/6 px-6 py-4 text-sm font-semibold text-center uppercase">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-y divide-gray-800">
                        <tr class="cursor-pointer">
                            <td class="px-6 py-4 text-center">
                                Banner1
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="p-3 text-white bg-red-700 border rounded-lg">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>