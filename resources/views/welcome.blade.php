<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Campus Rental') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-[#FDFDFC] font-sans">
        
        <nav class="flex items-center justify-between px-8 py-4 bg-white border-b border-gray-100">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <span class="font-bold text-xl text-gray-900">Campus Rental</span>
            </div>
            
            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900 px-4 py-2 border border-gray-200 rounded-lg">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-medium bg-[#0D1117] text-white px-4 py-2 rounded-lg hover:bg-black transition">Sign Up</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <section class="bg-blue-600 py-20 px-6 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Share Resources, Save Money</h1>
            <p class="text-lg mb-8 opacity-90">Rent and lend items within the University of Mindanao campus community.</p>
            
            <div class="max-w-2xl mx-auto bg-white rounded-xl p-2 flex items-center shadow-xl">
                <div class="pl-4 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" placeholder="Search for electronic, books, gadgets, clothes..." 
                       class="flex-grow px-4 py-3 text-gray-800 focus:outline-none border-none ring-0">
                <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                    Search
                </button>
            </div>
        </section>

        <section class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-5 w-full max-w-3xl mx-auto bg-gray-100/50 p-1 rounded-lg">
                @php
                    $categories = [
                        ['name' => 'All', 'icon' => 'M4 6h16M4 12h16M4 18h16'],
                        ['name' => 'Books', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                        ['name' => 'Gadgets', 'icon' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'],
                        ['name' => 'School Supplies', 'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'],
                        ['name' => 'Accessories', 'icon' => 'M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z'],
                    ];
                @endphp

                @foreach($categories as $category)
                    <button class="flex items-center justify-center gap-2 py-2 px-1 rounded-md text-sm font-medium transition-all duration-200 
                        {{ $category['name'] == 'All' 
                            ? 'bg-white text-gray-900 shadow-sm' 
                            : 'text-gray-500 hover:text-gray-700 hover:bg-white/50' }}">
                        
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $category['icon'] }}" />
                        </svg>

                        <span class="hidden md:inline">{{ $category['name'] }}</span>
                    </button>
                @endforeach
            </div>
        </section>

        <main class="max-w-7xl mx-auto px-8 pb-20">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-xl font-bold text-gray-900">All Available Items</h2>
                <span class="text-sm text-gray-500">Items available</span>
            </div>

            
        </main>
    </body>
</html>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
