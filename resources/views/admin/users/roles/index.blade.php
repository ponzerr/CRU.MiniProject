<x-front-end.admin-master>
    @section('content')
        <h1>Roles</h1>

            @if(session('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 mb-4">{{ session('success') }}</div>
            @endif

            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-1/4">
                    <form method="post" action="">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block mb-1">Name</label>
                            <input type="text" class="border-gray-300 rounded-md w-full py-2 px-3" name="name">
                            
                            @error('name')
                            <span class="text-red-500 text-sm"><strong>{{ $message }}</strong></span>
                                
                            @enderror
                        </div>
        
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md" type="submit">Create</button>
                    </form>
                </div>
        
                <div class="md:w-3/4 mt-4 md:mt-0">
                    <!-- DataTales Example -->
                    <div class="overflow-hidden shadow-md border-gray-200 rounded-lg">
                        <div class="bg-gray-200 py-3 px-4">
                            <h6 class="font-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="p-4">
                            <div class="overflow-x-auto">
                                <table class="w-full border-collapse border border-gray-300">
                                    <thead>
                                        <tr>
                                            <th class="border border-gray-300 px-4 py-2">Id</th>
                                            <th class="border border-gray-300 px-4 py-2">Name</th>
                                            <th class="border border-gray-300 px-4 py-2">Slug</th>
                                            <th class="border border-gray-300 px-4 py-2">Request</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">{{ $role->id }}</td>
                                            <td class="border border-gray-300 px-4 py-2"><a href="{{ route('role.edit', $role->id) }}" class="text-blue-500">{{ $role->name }}</a></td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $role->slug }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                <form method="post" action="{{ route('role.destroy', $role->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            @endsection
</x-front-end.admin-master>
