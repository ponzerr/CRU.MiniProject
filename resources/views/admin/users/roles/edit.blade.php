<x-front-end.admin-master>
    @section('content')
        <h1>Roles</h1>
<div class="mt-12 mb-8 grid grid-cols-2 gap-y-1 gap-x-6">
    <div class="relative bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
        <div class="relative bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-emerald-600 to-green-600 text-white shadow-gray-900/20 shadow-lg -mt-6 mb-8 p-6">
            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Edit Role</h6>
        </div>
        <form method="post" action="{{ route('role.update', $role->id) }}">
            @csrf
            @method('PUT') <!-- Assuming you are using PUT method for update -->
        
            <div class="p-8 grid grid-cols-1 gap-y-4 gap-x-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">User Role</label>
                    <input type="text" name="name" id="name" placeholder="Enter Role name"
                        value="{{ $role->name }}" 
                        class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <!-- Submit Button with updated text for role update -->
                <div class="flex justify-center mt-4 mb-4">
                    <button type="submit"
                        class="inline-flex items-center text-center px-6 py-2 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-700 to-blue-500 text-white border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Role <!-- Changed text to represent update action -->
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
        <div class="relative bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-emerald-600 to-green-600 text-white shadow-gray-900/20 shadow-lg -mt-6 mb-8 p-6">
            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Users Table</h6>
        </div>
        <div class="p-6 px-0 pt-0 pb-2">
            <table class="w-full min-w-[640px] table-auto ">
                <thead>
                    <tr>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Role</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Slug</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Request</p>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <div class="flex items-center gap-4">
                                    <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-semibold">{{ $role->name }}</p>
                            </div>
                        </td>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <div class="flex items-center gap-4">
                                    <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-semibold">{{ $role->slug }}</p>
                            </div>
                        </td>

                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <a href="{{ route('role.edit', $role->id) }}" class="relative grid grid-cols-2 items-center font-sans uppercase  select-none bg-gradient-to-tr from-red-600 to-red-400 text-white rounded-lg py-1 px-3 text-[11px] font-medium w-fit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" data-slot="icon" class="w-4 h-4">
                                    <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                    <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                                  </svg>
                                Edit</a>
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
</x-front-end.admin-master>
