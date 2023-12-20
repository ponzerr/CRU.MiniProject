<x-front-end.admin-master>
    @section('content')
        <div class="mt-12 mb-8 flex flex-col gap-12">
            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-800 shadow-md">
                <div class="relative bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-emerald-600 to-green-600 text-white shadow-gray-900/20 shadow-lg -mt-6 mb-8 p-6">
                    <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Edit Group Item</h6>
                </div>
                
                <div class="p-6 px-0 pt-0 pb-2"> 
                    <div class="relative flex flex-col text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border items-center">
                        <form action="{{ route('items_group.update', $group->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-y-4 gap-x-4">
                                <!-- Item Code -->
                                <div>
                                    <label for="item_group_code" class="block text-sm font-medium text-gray-700">Item Group Code</label>
                                    <input type="text" name="item_group_code" id="item_group_code" placeholder="Enter Group code" value="{{ $group->item_group_code }}"
                                        class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md capitalize" oninput="this.value = this.value.toUpperCase();">
                                </div>
                                <!-- Item Description -->
                                <div>
                                    <label for="item_group_desc" class="block text-sm font-medium text-gray-700">Item Group Description</label>
                                    <input type="text" name="item_group_desc" id="item_group_desc" placeholder="Enter Group description" value="{{ $group->item_group_desc }}"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="flex justify-center mt-4 mb-4">
                              <button type="submit"
                                  class="inline-flex items-center text-center px-9 py-2 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-700 to-blue-500 text-white border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                  Update
                              </button>
                          </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    @endsection
</x-front-end.admin-master>
