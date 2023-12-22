<x-front-end.admin-master>
    @section('content')
    <h1>Users</h1>
{{-- Users Datatable --}}
 <div class="mt-12 mb-8 flex flex-col gap-12">
    <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
        <div class="relative bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-emerald-600 to-green-600 text-white shadow-gray-900/20 shadow-lg -mt-6 mb-8 p-6">
            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Users Table</h6>
            <a href="{{ route('role.index') }}" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-transparent border-none focus:outline-none transition-all select-none font-sans font-medium text-center uppercase w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                </svg>                  
            </a>
        </div>
        
        <div class="p-6  px-0 pt-0 pb-2">
            <table class="w-full min-w-[640px] table-auto">
                <thead>
                    <tr>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">User</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Job Description</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">status</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Role</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Request</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <div class="flex items-center gap-4">
                                <div>
                                    <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-semibold">{{ $user->name }}</p>
                                    <p class="block antialiased font-sans text-xs font-normal text-blue-gray-500">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <p class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">{{ $user->position }}</p>
                            <p class="block antialiased font-sans text-xs font-normal text-blue-gray-500">{{ $user->department }}</p>
                        </td>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <div class="relative grid items-center font-sans uppercase whitespace-nowrap select-none" data-projection-id="22" style="opacity: 1;">
                                <span class="{{ $user->last_seen >= now()->subMinutes(2) ? 'bg-gradient-to-tr from-green-600 to-green-400' : 'bg-gradient-to-tr from-red-600 to-red-400' }} text-white rounded-lg py-0.5 px-2 text-[11px] font-medium w-fit">{{ $user->last_seen >= now()->subMinutes(2) ? 'Online' : 'Offline' }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <p class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</p>
                        </td>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <a href="{{ route('user.profile.show', $user->id) }}" class="relative grid grid-cols-2 items-center font-sans uppercase  select-none bg-gradient-to-tr from-red-600 to-red-400 text-white rounded-lg py-1 px-3 text-[11px] font-medium w-fit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" data-slot="icon" class="w-4 h-4">
                                    <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                    <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                                  </svg>
                                Edit</a>
                        </td>
                    </tr>
                    @endforeach
            </div>

        </div>

    </div>
</div>
@endsection
</x-front-end.admin-master>
