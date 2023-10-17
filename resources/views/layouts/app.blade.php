<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-gray-50 text-gray-900">

    <div id="app">
        <nav class="bg-white p-6 ">
            <div class="container mx-auto">
                <div class="flex justify-between items-center">
                    <a class="text-2xl font-bold text-cyan-600" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <!-- Right Side Of Navbar -->
                    <div class="space-x-6">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <a class="text-gray-700 hover:text-blue-600" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="text-gray-700 hover:text-blue-600" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                        
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                            {{-- <div x-data="{ open: false }" @click.away="open = false">
                                <button @click="open = !open" class="relative">
                                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path>
                                    </svg>
                                </button>
                                <div x-show="open" class="absolute mt-2 w-48 bg-white border rounded-md shadow-md z-10">
                                    
                                </div>
                            </div> --}}
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>

    <!-- Include Tailwind CSS here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.7/dist/tailwind.min.css" rel="stylesheet">

    <!-- Include AlpineJS for interactivity -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v3.x.x/dist/alpine.min.js" defer></script>
</body>
</html>