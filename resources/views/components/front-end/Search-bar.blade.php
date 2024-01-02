@if(request()->routeIs('users.index', 'users.search'))
<div class="flex items-center">
    <form action="{{ route('users.search') }}" method="GET" class="flex items-center">
        <input
        type="search"
        id="search"
        name="search"
        class="relative m-0 block min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
        placeholder="Search"
        aria-label="Search"
        aria-describedby="button-addon2" />
    
        <!-- Search button (icon) -->
        <button
            type="submit"
            class="align-middle select-none font-sans font-bold text-center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 ml-1 rounded-lg text-gray-500 hover:bg-gray-500/10 active:bg-gray-500/30 hidden items-center gap-1 px-2 xl:flex normal-case"
            id="button-addon2">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            class="h-5 w-5">
            <path
                fill-rule="evenodd"
                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                clip-rule="evenodd" />
            </svg>
        </button>
    </form>
@elseif(request()->routeIs('items.table', 'items.search'))
<div class="flex items-center">
    <form action="{{ route('items.search') }}" method="GET" class="flex items-center">
        <input
        type="search"
        id="search"
        name="search"
        class="relative m-0 block min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
        placeholder="Search"
        aria-label="Search"
        aria-describedby="button-addon2" />
    
        <!-- Search button (icon) -->
        <button
            type="submit"
            class="align-middle select-none font-sans font-bold text-center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 ml-1 rounded-lg text-gray-500 hover:bg-gray-500/10 active:bg-gray-500/30 hidden items-center gap-1 px-2 xl:flex normal-case"
            id="button-addon2">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            class="h-5 w-5">
            <path
                fill-rule="evenodd"
                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                clip-rule="evenodd" />
            </svg>
        </button>
    </form>
@endif