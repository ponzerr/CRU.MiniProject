<x-front-end.admin-master>
    @section('content')
        <h1>Profile</h1>
<div class="mt-12 mb-8 grid grid-cols-1 gap-y-1 gap-x-6">
    <div class="relative bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
        <div class="relative bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-emerald-600 to-green-600 text-white shadow-gray-900/20 shadow-lg -mt-6 mb-8 p-6">
            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Profile</h6>
        </div>
        <form method="post" action="{{ route('user.profile.update', $user) }}" >
            @csrf <!-- CSRF protection for Laravel forms -->
            @method('PUT')

        <div class="p-8 grid grid-cols-1 gap-y-4 gap-x-4">
            {{-- name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" placeholder="Input Name" value="{{ $user->name }}"
                    class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            {{-- username --}}
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" name="username" id="username" placeholder="Input Username" value="{{ $user->username }}"
                    class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            {{-- email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address:</label>
                <input type="text" name="email" id="email" placeholder="Input Email" value="{{ $user->email }}"
                    class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            {{-- contact number --}}
            <div>
                <label for="contact" class="block text-sm font-medium text-gray-700">Contact Number:</label>
                <input type="text" name="contact" id="contact" placeholder="Input Contact Number" value="{{ $user->contact }}"
                    class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            {{-- Job Position --}}
            <div>
                <label for="position" class="block text-sm font-medium text-gray-700">Job Position:</label>
                <input type="text" name="position" id="position" placeholder="Input Job Position" value="{{ $user->position }}"
                    class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            {{-- Company Department --}}
            <div>
                <label for="department" class="block text-sm font-medium text-gray-700">Job Position:</label>
                <input type="text" name="department" id="department" placeholder="Input Company Department" value="{{ $user->department }}"
                    class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
              <!-- Submit Button -->
              <div class="flex justify-center mt-4 mb-4">
                <button type="submit"
                    class="inline-flex items-center text-center px-6 py-2 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-700 to-blue-500 text-white border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Profile
                </button>
            </div>
        </div>
        </form>
    </div>
    @if(auth()->user()->userHasRole('SuperAdmin'))
    <div class="mt-12 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
        <div class="relative bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-emerald-600 to-green-600 text-white shadow-gray-900/20 shadow-lg -mt-6 mb-8 p-6">
            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Roles Table</h6>
        </div>
        <div class="p-6 px-0 pt-0 pb-2">
            <table class="w-full min-w-[640px] table-auto ">
                <thead>
                    <tr>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Checkbox</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Role</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Slug</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Detach</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Attach</p>
                        </th>
        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <input type="checkbox" class="flex items-center gap-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                @foreach($user->roles as $user_role)
                                    @if($user_role->slug == $role->slug)
                                        checked
                                    @endif
                                @endforeach>
                        </td>
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
                            <form method="post" action="{{ route('user.role.attach', $user) }}">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="role" value="{{ $role->id }}">
                                <button class="relative flex items-center font-sans uppercase whitespace-nowrap select-none bg-gradient-to-tr from-green-600 to-green-400 text-white rounded-lg py-1 px-3 text-xs font-medium"
                                        @if($user->roles->contains($role))
                                            disabled
                                        @endif>
                                    Attach
                                </button>
                            </form>
                        </td>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <form method="post" action="{{ route('user.role.detach', $user) }}" >
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="role" value="{{ $role->id }}">
                            <button class="relative flex items-center font-sans uppercase whitespace-nowrap select-none bg-gradient-to-tr from-red-600 to-red-400 text-white rounded-lg py-1 px-3 text-xs font-medium"
                            @unless($user->roles->contains($role))
                                            disabled
                                        @endunless>
                                        Detach</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection
</x-front-end.admin-master>
