<!doctype html>
<html class="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eagro Home</title>
  @vite('resources/css/app.css')

  {{-- links --}}
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>


</head>
<body>
  <div class="container absolute left-2/4 z-10 mx-auto -translate-x-2/4 p-4 ">
    <nav class="block w-full max-w-screen-2xl rounded-xl bg-transparent text-dark shadow-none p-3">
        <div class="container mx-auto flex items-center justify-between text-dark">
            <a href="{{ route('home') }}">
            <p class="block antialiased font-sans text-base leading-relaxed text-inherit mr-4 ml-2 cursor-pointer py-1.5 font-bold">Eagro: Price Changer</p>
            </a>
            <div class="hidden lg:block">
                <ul class="mb-4 mt-2 flex flex-col gap-2 text-inherit lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                    <li class="block antialiased font-sans text-sm font-light leading-normal text-inherit capitalize">
                        <a class="flex items-center gap-1 p-1 font-bold drop-shadow-md" href="{{ route('home') }}">Home</a>
                    </li>
                    @auth
                        <li class="block antialiased font-sans text-sm font-light leading-normal text-inherit capitalize">
                            <a class="flex items-center gap-1 p-1 font-bold drop-shadow-md" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        </li>
                        <li class="block antialiased font-sans text-sm font-light leading-normal text-inherit capitalize">
                            <a class="flex items-center gap-1 p-1 font-bold drop-shadow-md" href="{{ route('profile.edit')}}">Profile</a>
                        </li>
                    @else
                        <li class="block antialiased font-sans text-sm font-light leading-normal text-inherit capitalize">
                            <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 rounded-lg bg-gradient-to-tr from-emerald-800 to-emerald-700 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] block w-full"><a class="flex items-center gap-1 p-1 font-bold drop-shadow-md" href="{{ route('login') }}">Sign In</a></button>
                        </li>
                        @if (Route::has('register'))
                            <li class="block antialiased font-sans text-sm font-light leading-normal text-inherit capitalize">
                                <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 rounded-lg bg-gradient-to-tr from-emerald-500 to-emerald-400 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] block w-full"><a class="flex items-center gap-1 p-1 font-bold drop-shadow-md" href="{{ route('register') }}">Sign Up</a></button>
                            </li>
                        @endif
                    @endauth
                    <li class="block antialiased font-sans text-sm font-light leading-normal text-inherit capitalize">
                        <a href="https://www.material-tailwind.com/docs/react/installation" target="_blank" class="flex items-center gap-1 p-1 font-bold drop-shadow-md">Docs</a>
                    </li>
                </ul>
            </div>
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf  
            <div class="hidden gap-2 lg:flex ">
                <a href="{{ route('home') }}" target="_blank">
                    <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 rounded-lg bg-gradient-to-tr from-emerald-700 to-green-600 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] block w-full" type="submit"><a class="flex items-center gap-1 p-1 font-bold drop-shadow-md">signout</a></button>
                </a>
            </div>
            </form>
            @endauth
        </div>
    <nav>
    </div>
</body>
</html>

