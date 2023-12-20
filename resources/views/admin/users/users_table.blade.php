<x-front-end.admin-master>
    @section('content')
    <h1>Users</h1>
{{-- Users Datatable --}}
 <div class="mt-12 mb-8 flex flex-col gap-12">
    <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
        <div class="relative bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-emerald-600 to-green-600 text-white shadow-gray-900/20 shadow-lg -mt-6 mb-8 p-6">
            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Users Table</h6>
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
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">employed</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400"></p>
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
                            <a href="#" class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">Edit</a>
                        </td>
                    </tr>
                    @endforeach
            </div>

        </div>

    </div>
</div>
@endsection
</x-front-end.admin-master>
