<x-front-end.admin-master>
    @section('content')
        <h1>Crops</h1>

        {{-- Alert Panel --}}
        @if(session('success'))
            <div role="alert" class="mt-4 relative flex w-full px-4 py-3 text-base text-white bg-green-600 rounded-lg font-regular">
                <div class="shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                      </svg>                      
                </div>
                <div class="ml-3 mr-12">{{ session('success') }}</div>
            </div>
        @endif

        <div class="mt-12 mb-8 flex flex-col gap-12">
            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                <div class="relative mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-emerald-600 to-green-600 text-white shadow-gray-900/20 shadow-lg -mt-6 mb-8 p-6">
                    <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Items Table</h6>
                    @if(auth()->user()->userHasRole('SuperAdmin'))   
                    <a href="{{ route('items.create') }}" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-transparent border-none focus:outline-none transition-all select-none font-sans font-medium text-center uppercase w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon" class="w-8 h-8">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    @endif
                </div>
                
                <div class="p-6  px-0 pt-0 pb-2">
                    <table class="w-full min-w-[640px] table-auto">
                        <div id="pagination-container"></div>
                        <thead>
                            <tr>
                                <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                                    <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Item Code</p>
                                </th>
                                <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                                    <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Item Description</p>
                                </th>
                                <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                                    <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Item Group</p>
                                </th>
                                <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                                    <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Item Price</p>
                                </th>
                                <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                                    <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Created by</p>
                                </th>
                                @if(auth()->user()->userHasRole('SuperAdmin'))   
                                <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                                    <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Request</p>
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="py-3 px-5 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-4">
                                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-semibold">{{ $item->item_code }}</p>
                                    </div>
                                </td>
                                <td class="py-3 px-5 border-b border-blue-gray-50">
                                    <p class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">{{ $item->item_desc }}</p>
                                </td>
                                <td class="py-3 px-5 border-b border-blue-gray-50">    
                                    <p class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">
                                            {{ $item->group->item_group_code }}</p>
                                </td>
                                <td class="py-3 px-5 border-b border-blue-gray-50">
                                    <p class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">{{ $item->item_price }}</p>
                                </td>
                                <td class="py-3 px-5 border-b border-blue-gray-50">
                                    <p class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">{{ $item->user->username }}</p>
                                </td>
                                @if(auth()->user()->userHasRole('SuperAdmin'))   
                                <td class="py-3 px-5 border-b border-blue-gray-50">
                                    <a href="{{ route('items.edit', $item->id) }}" class="relative grid grid-cols-2 items-center font-sans uppercase  select-none bg-gradient-to-tr from-red-600 to-red-400 text-white rounded-lg py-1 px-3 text-[11px] font-medium w-fit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" data-slot="icon" class="w-4 h-4">
                                            <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                            <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                                          </svg>
                                        Edit</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                     <!-- Pagination Links -->
                    <div class="mt-4 mb-4 from-green-400 to-emerald-400 flex items-center justify-center ">
                        <div class="">
                    
                            <div class="flex justify-center">
                                <nav class="flex space-x-2" aria-label="Pagination">
                    
                                    {{-- Previous Page Button --}}
                                    @if ($items->onFirstPage())
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-fuchsia-100 hover:bg-fuchsia-200 cursor-not-allowed leading-5 rounded-md transition duration-150 ease-in-out focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 bg-gray-300 px-4 py-2 rounded-md cursor-not-allowed opacity-50">Previous</a>
                                    @else
                                        <a href="{{ $items->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm bg-gradient-to-r from-green-500 to-emerald-500 border border-fuchsia-100 hover:border-violet-100 text-white font-semibold cursor-pointer leading-5 rounded-md transition duration-150 ease-in-out focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10">Previous</a>
                                    @endif
                    
                                    {{-- Loop through pagination links --}}
                                    @foreach ($items->links()->elements[0] as $pageNumber => $url)
                                        @if (is_string($pageNumber))
                                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-fuchsia-100 hover:bg-fuchsia-200 cursor-pointer leading-5 rounded-md transition duration-150 ease-in-out focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10">{{ $pageNumber }}</a>
                                        @else
                                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-fuchsia-100 hover:bg-fuchsia-200 cursor-pointer leading-5 rounded-md transition duration-150 ease-in-out focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10">{{ $pageNumber }}</a>
                                        @endif
                                    @endforeach
                    
                                    {{-- Next Page Button --}}
                                    @if ($items->hasMorePages())
                                        <a href="{{ $items->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm bg-gradient-to-r from-green-500 to-emerald-500 border border-fuchsia-100 hover:border-violet-100 text-white font-semibold cursor-pointer leading-5 rounded-md transition duration-150 ease-in-out focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10">Next</a>
                                    @else
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-fuchsia-100 hover:bg-fuchsia-200 cursor-not-allowed leading-5 rounded-md transition duration-150 ease-in-out focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 bg-gray-300 px-4 py-2 rounded-md cursor-not-allowed opacity-50">Next</a>
                                    @endif
                    
                                </nav>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                
                </div>
            </div>
        </div>
    @endsection
</x-front-end.admin-master>
